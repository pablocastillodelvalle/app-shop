<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use File;
use App\Product;
use App\ProductImage;



use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
        // guardar la imagen en nuestro proyecto
        $file = $request->file('photo');
        $path = public_path() . '/img/products';
        $fileName =uniqid() . '-' . $file->getClientOriginalName();
        $move = $file->move($path, $fileName);

        // crear un registro en la tabla product_images
        // siempre que se guarde correctamente
        // se usa $move
        if($move)
        {
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            // $productImage->feture = false;
            $productImage->product_id =$id;
            $productImage->save(); // INSERT
        }

        return back();
    }

    public function destroy(Request $request, $id)
    {
        // eliminar archivo
        $productImage = ProductImage::find($request->image_id); // se busca el producto correspondiente a $id
        if(substr($productImage->image, 0, 4) === "http") // se evalua si existe, usando el prefijo 'http'
        {
            $deleted = true; // si es afirmativo se procede a eliminar el registro en la BD ya que no existe en el servidor
        } else { // de lo contrario
            $fullPath = public_path() .'/img/products/' . $productImage->image; // Se especifica la ruta exacta del archivo
            $deleted = File::delete($fullPath); // Se procede a eliminarlo del servidor
        }

        // eliminar registro de la img en la base de datos
        if($deleted)
        {
            $productImage->delete();
        }
        return back();
    }

    public function select($id, $image)
    {
        ProductImage::where('product_id', $id)->update([
            'featured' => false // actualiza el estado de todas las imagenesa 'false' en "featured"
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }

}
