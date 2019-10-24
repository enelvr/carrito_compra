<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Cart};

class CarritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function agregarProductoCarrito(Request $request)
    {
        $productid = $request->productoid;
        $userid = \Auth::user()->id;

        $carrito = Cart::where('user_id', $userid)->where('product_id', $productid)->first();
        if (is_null($carrito)) {
            $carrito = new Cart();
            $carrito->user_id = $userid;
            $carrito->product_id = $productid;
            $carrito->cantidad = 1;
        } else {
            $carrito->cantidad += 1;
        }
        $carrito->save();

        $data = [
            'mensaje' => 'Se ha añadido el producto al carrito',
        ];

        return response()->json($data, 200);
    }

    public function eliminarProductoCarrito(Request $request)
    {
        $productid = $request->productoid;

        $carrito = Cart::find($productid);
        if (is_null($carrito)) {
            return redirect()->back();
        }
        
        $carrito->delete();

        return redirect()->route('ver_carrito');
    }

    public function verCarritoCompra()
    {
        $userid = \Auth::user()->id;

        $productos = Cart::with('producto')->where('user_id', $userid)->get();

        $total_cantidad = $productos->sum('cantidad');

        $total_monto = 0;
        foreach($productos as $producto) {
            $p = $producto->producto;
            $total_monto += $producto->cantidad * $p->precio;
        }

        return view('carrito', compact('productos', 'total_cantidad', 'total_monto'));
    }
}
