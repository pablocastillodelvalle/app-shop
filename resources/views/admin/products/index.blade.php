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
        <h2 class="title">Listado de productos...</h2>

        <div class="team">
            <a href="{{ url('/admin/products/create') }}" class="btn btn-primary">Nuevo producto</a>
            <br/><br/><br/>

          <div class="row">
            <div class="d-flex">
                <div class="mx-auto">
                    {{$products->links("pagination::bootstrap-4")}}
                </div>
                </div>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" class="td-price">Precio</th>
                        <th scope="col" class="td-action">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                        <td>&dollar;{{ $product->price }}</td>
                        <td>
                            <form method="post" action="{{ url('/admin/products/'.$product->id.'/' ) }}">
                                @csrf
                                @method('DELETE')

                                <a href="{{ url('/admin/products/{id}/') }}" type="button" rel="tooltip" title="Ver producto" class="btn btn-link btn-just-icon btn-info">
                                    <i class="material-icons">info</i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" type="button" rel="tooltip" title="Editar producto" class="btn btn-link btn-just-icon btn-success">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/images') }}" type="button" rel="tooltip" title="Imagenes del producto" class="btn btn-link btn-just-icon btn-warning">
                                    <i class="material-icons">image</i>
                                </a>
                                <button  type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-link btn-just-icon btn-danger">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <td class="text-center" colspan="6"></td>
                </tfoot>
            </table>
            </div>
          </div>
          <div class="d-flex">
            <div class="mx-auto">
                {{$products->links("pagination::bootstrap-4")}}
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
