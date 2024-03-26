<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function store(Request $request)
    {
        //
        request()->validate([
            "client" => "required",
            "products" => "required|array",
        ]);

        $client = Client::where("id", $request->client)->first();


        $client->products()->attach($request->products);

        return back();
    }
}
