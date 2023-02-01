<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderReport implements FromView
{
    public function view(): View
    {
        return view('dashboard.admin.orders.order-report', [
            'orders' =>Order::filter(request(['period']))->get(),
            'title'=>'Order Report | Urban Adventure',
            'total' => Order::all()->sum('gross_amount')
        ]);
    }
}