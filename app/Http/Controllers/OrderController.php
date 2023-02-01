<?php

namespace App\Http\Controllers;

use App\Exports\OrderReport;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function allOrder()
    {
        $data = [
            'title' => 'Orders | Urban Adventure',
            'order' => Order::latest()->filter(request(['search','period']))->paginate(10),
        ];
        return view('dashboard.admin.orders.order-all', $data);
    }

    public function createOrder()
    {
        $data = [
            'title' => 'Add New Order | Urban Adventure'
        ];
        return view('dashboard.admin.orders.order-add', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders.*.product' => 'required|string',
            'orders.*.amount' => 'required|numeric',
            'orders.*.price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Something Error With Your Input!')->withInput()->withErrors($validator);
        }
    }

    public function detailOrder(Order $order)
    {
        $data = [
            'title' => 'Order Detail | Urban Adventure',
            'order' => $order
        ];
        return view('dashboard.admin.orders.order-detail', $data);
    }

    public function reportPDF(){
        $total = Order::all()->sum('gross_amount');
        $data=[
            'title'=>'Order Report | Urban Adventure',
            'orders' => Order::filter(request(['period']))->get(),
            'total'=>$total,
        ];
        $pdf = PDF::loadView('dashboard.admin.orders.order-report', $data);
        return $pdf->stream('order-report');
    }

    public function reportExcel() 
    {
        return Excel::download(new OrderReport, 'report.xlsx');
    }

}