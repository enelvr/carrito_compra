@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($productos as $producto)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $producto->nombre }}</h4>
                    <h4 class="card-title">$ {{ number_format($producto->precio, 2) }}</h4>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <a href="#" class="btn btn-primary btn-block" onclick="agregarProductoCarrito(this, event, {{ $producto->id }})">
                        Agregar al Carrito
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    const token = '{!! csrf_token() !!}';

    function agregarProductoCarrito(button, e, productoid){
        e.preventDefault();
        const spinner = '<i class="fas fa-spinner fa-spin"></i>';

        $(button).html(spinner);

        const params = {
            _token: token,
            productoid: productoid,
        };

        const url = 'carrito/agregar-producto';

        axios.post(url, params)
        .then(response => {
            console.log(response.data);
            alert(response.data.mensaje);
        })
        .catch(error => {
            console.log(error);
            alert('Hubo un error al procesar la solicitud');
        })
        .finally(() => {
            $(button).html('Agregar al Carrito');
        });
    }
</script>
@endsection
