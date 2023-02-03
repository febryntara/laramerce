<?php

namespace App\Models;

use App\Mail\OrderMail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['transaction_id', 'payment_token', 'payment_type', 'transaction_status'];

    // instant value

    // relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['period'] ?? false, function ($query, $period) {
            $periods = explode("-", $period);
            $year = $periods[0];
            $month = $periods[1];
            return $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')->WhereHas('details', function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%')->orWhere('product_id', '=', $search);
            })->WhereHas('user', function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%')->orWhere('phone', 'like', '%' . $search . '%');
            });
        });
    }


    // method
    public static function generate($customer, $shipping, $item, $transaction)
    {
        $products = [];
        foreach ($item as $index => $product) {
            if ($product['id'] != 'delivery') {
                $pd = Product::where('product_code', $product['id'])->first();
                if ($pd->stock < $product['quantity']) {
                    return false;
                }
                $products[] = $pd;
            }
        }

        $order = new Order();
        $order->id = $transaction['order_id'];
        // customer
        $order->user_id = auth()->user()->id;
        $order->name = $customer['name'];
        $order->phone = $customer['phone'];
        $order->email = $customer['email'];
        $order->post_code = $customer['post_code'];
        $order->country = $customer['country'];
        // shipping
        $order->address = $shipping['address'];
        $order->province = $shipping['province'];
        $order->delivery_name = $shipping['delivery_name'];
        $order->delivery_service = $shipping['delivery_service'];
        $order->city = $shipping['city'];
        $order->cost = $shipping['cost'];
        // transaction
        $order->gross_amount = $transaction['gross_amount'];
        $order->transaction_id = $transaction['order_id'];
        $order->payment_token = SnapToken::claim($transaction, $customer, $item, $shipping);
        // etc
        $order->comments = request()->has('comments') ? request()->comments : null;
        $order->save();

        foreach ($item as $index => $product) {
            $order->details()->create([
                'product_id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
            ]);

            if ($product['id'] != 'delivery') {
                $products[$index]->stock -= $product['quantity'];
                $products[$index]->save();
            }
        }

        Mail::to($customer['email'])->send(new OrderMail($order));

        return $order;
    }
    // bootable
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
        });

        self::created(function ($model) {
        });

        self::updating(function ($model) {
            // ... code here
        });

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($model) {
            // ... code here
        });

        self::deleted(function ($model) {
            $model->detail()->delete();
        });
    }
}