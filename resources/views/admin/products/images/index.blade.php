@extends('layouts.app')

@section('body-class', 'products-page sidebar-collapse')
@section('title', 'Listado de productos...')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url( {{ asset('/img/profile_city.jpg') }} );">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">

      <div class="section text-center">
        <h2 class="title">Imagenes de "{{ $product->name }}"</h2>

        <div class="team">
            <br/><hr>
        <form method="post" action="" enctype="multipart/form-data">
            @csrf

            <input type="file" name="photo" required>
            <button type="submit" class="btn btn-primary btn-link">Subir nueva imagen</button>
            <a href="{{ '/admin/products' }}" class="btn btn-default btn-link">Volver al listado de productos</a>
        </form>
            <hr><br/>


          <div class="row">
            @foreach($images as $image)
            <div class="col-md-2">
                <div class="card">
                    <!-- Eliminar comentario url es un campo calculado, declarado en App\ProductImage.php -->
                    <img src="{{ $image->url }}" class="card-img-top" alt="...">
                    <form method="post" action="">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="image_id" value="{{ $image->id }}">
                        <button type="submit" class="btn btn-danger btn-link">Eliminar imagen</button>
                        @if($image->featured)
                        <button type="button" class="btn btn-danger btn-just-icon" rel="tolltip" title="Imagen destacada">
                            <i class="material-icons">favorite</i>
                        </button>
                        @else
                        <a href="{{ url('/admin/products/' . $product->id . '/images/select/'. $image->id) }}" class="btn btn-dafault btn-just-icon">
                            <i class="material-icons">favorite</i>
                        </a>
                        @endif
                    </form>

                </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
