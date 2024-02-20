<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

    }

    public function index()
    {
        return auth()->user()->orders;
    }

    public function store(StoreOrderRequest $request)
    {
        $sum=100;
        $products= Product::query()->limit(4)->get();


        auth()->user()->orders()->create([
            'comment'           =>$request->comment,
            'deliver_method_id' =>$request->deliver_method_id,
            'payment_type_id'   =>$request->payment_type_id,
            'address_id'        =>$request->address_id,
            'sum'               =>$sum,
            'products'          =>$products,

        ]);

        return "success";
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
