<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('orders.create', compact('orders'));
    }

    public function store(Request $request)
    {
        // Validate and store the order data
        $validatedData = $request->validate([
            'service_id' => 'required',
            'seller_id' => 'required',
            'order_date' => 'required|date',
            'order_status' => 'required|string',
        ]);

        $user = Auth::user();
        $order = new Order([
          'service_id' => $validatedData['service_id'],
          'seller_id' => $validatedData['seller_id'],
          'order_date' => $validatedData['order_date'],
          'order_status' => $validatedData['order_status'],
        ]);
        // $order->buyer()->associate($user->id);
        // $order->save();
        if ($user && $order) {
          $order->buyer()->associate($user->id);
          $order->save();
      } else {
          // Gérer le cas où $user ou $order est null
      }


        return redirect()->route('orders.index')
        ->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the order data
        $order = Order::findOrFail($id);

        $data = $request->validate([
          'service_id' => 'required',
          'buyer_id' => 'required',
          'seller_id' => 'required',
          'order_date' => 'required|date',
          'order_status' => 'required|string',
        ]);

        $order->update($data);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

}
