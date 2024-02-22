<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAddress;

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
        $sum=0;
        $products= [];
        $address=UserAddress::find($request->address_id);

        foreach ($request['products'] as $product){
            $prod = Product::with('stocks')->findOrFail($product['product_id']);

//            dd($prod->stocks()->find($product['stock_id']));


            if ($prod->stocks()->find($product['stock_id']) &&
                $prod->stocks()->find(($product['stock_id']))->quantity > $product['quantity'])
            {
                $productWithStock=$prod->withStock($product['stock_id']);
                $productResource = new ProductResource($productWithStock);
                $products[] = $productResource['data'];
            }

            dd($products);
        }


        auth()->user()->orders()->create([
            'comment'           =>$request->comment,
            'delivery_method_id' =>$request->delivery_method_id,
            'payment_type_id'   =>$request->payment_type_id,
            'address'           =>$address,
            'sum'               =>$sum,
            'products'          =>$products,

        ]);
//        dd($request);

       return "success";
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
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
