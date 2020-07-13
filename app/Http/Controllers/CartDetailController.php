<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        if(!auth()->user())
            return redirect()->route('login');

        $cartDetail = new CartDetail();
        // cart_id -> Campo calculado -> Modelo User
        // para recuperar el 'id' del usuario que ha iniciado sesión
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        $notification = "El producto se ha cargado a tu carrto de compras exitosamente!";
        return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);
        if($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();

        $notification = "El producto se ha elimindo de carrito correctamente!";
        return back()->with(compact('notification'));
    }
}
