<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = "Pending";
        $cart->save(); //APDATE

        $notification = "Tu pedido se ha registrado exitosamente, te contactaremos a la brevedad vía email!";
        return back()->with(compact('notification'));
    }

}
