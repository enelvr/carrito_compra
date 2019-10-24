@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Carrito de Compra</h4>

  @if ($productos->isEmpty())
    <div class="card">
      <div class="card-body">
        <p class="card-title">No hay productos agregados en el carrito</p>
      </div>
    </div>
         
  @else      
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th style="width: 15%"></th>
          <th>Nombre</th>
          <th style="width: 15%">Precio</th>
          <th style="width: 10%">Cantidad</th>
          <th style="width: 10%"></th>
        </tr>
      </thead>
      @foreach ($productos as $producto)
      <tbody>
        <tr>
          <td>
            <img src="{{ $producto->producto->imagen }}" alt="{{ $producto->producto->nombre }}" width="120">
          </td>
          <td>
            {{ $producto->producto->nombre }}
          </td>
          <td>
            $ {{ number_format($producto->producto->precio, 2) }}
          </td>
          <td>
            {{ $producto->cantidad }}
          </td>
          <td>
            <button type="button" class="btn btn-danger" onclick="eliminarProductoCarrito({{ $producto->id }})">Eliminar</button>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>

    <form action="{{ route('eliminar_producto_carrito') }}" method="POST" id="eliminarProductoCarritoForm">
      @csrf
      <input type="hidden" name="_method" value="delete">
      <input type="hidden" name="productoid" value="0">
    </form>

    <div class="row justify-content-end">
      <div class="col-md-5">
        <div class="card text-left">
          <div class="card-body">
            <h4 class="card-title">Total ({{ $total_cantidad }} Productos): $ {{ number_format($total_monto, 2) }}</h4>
            <a href="#" class="btn btn-primary btn-block">Proceder con la Compra</a>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection

@section('scripts')
<script>
    function eliminarProductoCarrito(productoid){
      const form = $('#eliminarProductoCarritoForm');
      $('input[name=productoid]').val(productoid);
      form.submit();
    }
</script>
@endsection