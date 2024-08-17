<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // passing only the logged user's orders to the view and sort them by created_at and payment_status in descending order
        $userOrders = auth()->user()->orders()->paginate(10)->sortByDesc('created_at');

        return view('order.index', [
            'orders' => $userOrders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Fetch the cart associated with the order
        $cart = $order->cart;
        // Fetch the products associated with the cart
        $products = $cart ? $cart->products : collect();

        return view('order.show', compact('order', 'products'));
    }
}
