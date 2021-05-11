<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //Crear pedido

    public function createOrder(Request $request){

        $titleComic = $request->input('titleComic');
        $imageComic = $request->input('imageComic');
        $price = $request->input('price');
        $iduser = $request->input('iduser');

        try{
            return Order::create([
                'titleComic' => $titleComic,
                'imageComic' => $imageComic,
                'price' => $price,
                'iduser' => $iduser,
            ]);
        }catch(QueryException $error){
            return $error;
        }
    }

    //Buscar pedidos según iduser

    public function searchOrderById($id) {
        
        return Order::where('iduser', '=', $id)
        ->get();
    }
}
