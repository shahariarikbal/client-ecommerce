<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'index',
            'orders' => Order::orderBy('created_at', 'desc')->get()
        ];

        return view('backend.order.index', compact('data'));
    }

    public function destroy(Order $order)
    {

    	foreach ($order->orderProducts as $orderProduct) {
    		$orderProduct->delete();
    	}

        $order->delete();
        return redirect()->back()->withSuccess('Order has been successfully deleted.');
    }
}
