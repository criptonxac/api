<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Collection;


class UserAddressController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return auth()->user()->addresses()->get();;
    }

    public function store(StoreUserAddressRequest $request)
    {

        auth()->user()->addresses()->create($request->toArray());
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
