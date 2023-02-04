<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MidtransApiController extends Controller
{
    public function paymentNotif(Request $request)
    {
        $json = json_decode($request->getContent());
        $signatureKey = hash('SHA512', $json->order_id . $json->status_code . $json->gross_amount . config('midtrans.server_key'));
        if ($signatureKey == $json->signature_key) {
            $order = Order::find($json->order_id);
            $updated = $order->update([
                'transaction_status' => $json->transaction_status,
                'payment_type' => $json->payment_type,
                'bank' => $json->va_numbers[0]['bank'] ?? NULL,
                'settlement_time' => $json->settlement_time ?? NULL
            ]);

            if ($updated) {
                Mail::to($order->email)->send(new OrderMail($order));
            }

            // return 'same';
        }
        // return 'not same';
    }

    public function updateOrder(Request $request, Order $order)
    {
        if ($request->key == env('APP_KEY')) {
            $isUpdated = $order->update([
                'payment_type' => $request->payment_type ?? NULL,
                'bank' => $request->va_numbers[0]['bank'] ?? NULL,
                'settlement_time' => $request->settlement_time ?? NULL
            ]);
            if ($isUpdated) {
                return response()->json(['status' => 200, 'message' => "Order Updated", 'request' => $request->va_numbers[0]['bank'], 'order' => $order]);
            }
            return response()->json(['status' => 201, 'message' => "Order Fail To Update"]);
        }
        return response()->json(['status' => 404, 'message' => "Key Doesn't Match"]);
    }
}
