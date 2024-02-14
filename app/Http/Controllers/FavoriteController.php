<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');

    }

    public function index()
    {

        return auth()->user()->favorites()->paginate(20);

    }

    public function store(Request $request): JsonResponse
    {
        auth()->user()->favorites()->attach($request->product_id);

        return response()->json([

            'succses'=>true,

        ]);
    }

    /*
     * TODO refraktor response make. standart format
     * 
     * */

    public function destroy( $favorite_id)
    {
        if (auth()->user()->hasFavorite($favorite_id)){
            auth()->user()->favorites()->detach($favorite_id);

            return response()->json(['succses'=>true]);
        }

        return response()->json(['succses'=>false,'massage'=>'favorite topilmadi']);
    }

}