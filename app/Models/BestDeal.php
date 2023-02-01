<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestDeal extends Model
{
    use HasFactory;
    protected $fillable = ['product_code'];

    // instant value
    public static function products()
    {
        $arr_bd = BestDeal::all()->map(function ($item) {
            return $item->product_code;
        });

        return Product::whereIn('product_code', $arr_bd);
    }

    // relationship
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code');
    }
}
