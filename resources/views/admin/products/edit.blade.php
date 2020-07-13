@extends('layouts.app')

@section('body-class', 'products-page sidebar-collapse')
@section('title', 'Bienvenidos a App-Shop')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url( {{ asset('/img/profile_city.jpg') }} );">
  </div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Editar producto...</h2>

        @if($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul class="">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
          @endif

        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">

            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre del producto</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name', $product->name) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripción corta</label>
                        <input id="description" class="form-control" type="text" name="description" value="{{ old('description', $product->description) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Precio del producto</label>
                        <input id="price" class="form-control" type="number" step="100" name="price" value="{{ old('price', $product->price) }}" this.setCustomValidity('Ingrese números multiplos de 100')>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea class="form-control" placeholder="Descrición extensa del producto" id="long_description" name="long_description" rows="3">
                    {{ old('long_description ', $product->long_description) }}</textarea>
            </div>

            <button type="submit"  class="btn btn-primary">Editar producto seleccionado</button>
            <a href="/admin/products" class="btn btn-default">Cancel</a>

        </form>

      </div>

    </div>
  </div>
@endsection
