<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Muestra el listado completo de productos paginados
    public function index()
    {
        $products = Product::paginate(10); // paginación
        return view('admin.products.index')->with(compact('products')); // Listado
    }

    // Muestra el formulario para la creación de un nuevo producto
    public function create()
    {
        return view('admin.products.create');

    }

    // Se guardan los datos e n la BD y
    // redirige al listdo de productos del administrador
    public function store(Request $request)
    {
        // Validación
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules);

        // registrar un producto en la bd
        $product = new product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save(); //INSERT

        return redirect('/admin/products');

    }

    // Muestra el formulario para la edición de un producto
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));

    }

    // Se guardan los datos e n la BD y
    // redirige al listdo de productos del administrador
    public function update(Request $request, $id)
    {
        // Validación
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules);

        // registrar un producto en la bd
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->update(); //UPDATE

        return redirect('/admin/products');

    }

    // Se guardan los datos e n la BD y
    // redirige al listdo de productos del administrador
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete(); //DELETE

        return back();

    }

}
