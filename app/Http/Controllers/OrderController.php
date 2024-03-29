<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
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
                    $notFoundProduct = [];

                    foreach ($request['products'] as $requestProduct){
                        $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);

                        $product->quantity = $requestProduct['quantity'];

                        if ($product->stocks()->find($requestProduct['stock_id']) &&
                            $product->stocks()->find(($requestProduct['stock_id']))->quantity >= $requestProduct['quantity'])
                        {
                            $productWithStock=$product->withStock($requestProduct['stock_id']);
                            $productResource = new ProductResource($productWithStock);

                            $sum += $productResource['price'];
                            $products[] = $productResource->resolve();
                        } else {

                            $requestProduct ['we_have'] =  $product->stocks()->find(($requestProduct['stock_id']))->quantity;
                            $notFoundProduct [] =  $requestProduct ;

                        }

                    }

                    /*TODO add status of oder
                     *
                     */
                    if ($notFoundProduct == [] && $products !== [] && $sum !== 0) {
//                        dd(in_array($request['payment_type_id'],[1,2])?.1 : 10,);
                        $order = auth()->user()->orders()->create([
                            'comment'               => $request->comment,
                            'delivery_method_id'    => $request->delivery_method_id,
                            'payment_type_id'       => $request->payment_type_id,
                            'address'               => $address,
                            'status_id'             => in_array($request['payment_type_id'],[1,2])?.1 : 10,
                            'sum'                   => $sum,
                            'products'              => $products,

                        ]);

                        if ($order) {
                            foreach ($products as $product) {
                                //                   $stock = Product::with('stocks')->find($product['id'])->stocks()->find($product['inventory'][0]['id']);

                                $stock = Stock::find($product['inventory'][0]['id']);
                                $stock->quantity -= $product['order_quantity'];
                                $stock->save();


                            }

                        }
                        return "success";

                    } else {

                        return response([

                            'success'               =>false,
                            'massage'               =>'some products not found or does not have in inventory',
                            'not_found_products'    => $notFoundProduct,

                        ]);
                    }
//                return "somthing went wrong, cant create order";

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
