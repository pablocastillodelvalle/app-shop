@extends('layouts.app')

@section('body-class', 'products-page sidebar-collapse')
@section('title', 'Bienvenidos a App-Shop')

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url( {{ asset('/img/profile_city.jpg') }} );">
  </div>

  <div class="main main-raised">
    <div class="container">

      <div class="section">
        <h2 class="title text-center">Registrar nuevo producto...</h2>

        @if($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul class="">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
          @endif

        <form method="post" action="{{ url('/admin/products') }}">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre del producto</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripción corta</label>
                        <input id="description" class="form-control" type="text" name="description" value="{{ old('description') }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Precio del producto</label>
                    <input id="price" class="form-control" type="number" step="100.00" name="price" value="{{ old('price') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea class="form-control" placeholder="Descrición extensa del producto" id="long_description" name="long_description" rows="5">{{ old('long_description') }}</textarea>
            </div>

            <button type="submit"  class="btn btn-primary">Registrar producto</button>
            <a href="/admin/products" class="btn btn-default">Cancel</a>

        </form>

      </div>

    </div>
  </div>
@endsection
