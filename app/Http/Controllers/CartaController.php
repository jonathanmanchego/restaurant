<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\carta;
use restaurant\models\tipo_carta;
use restaurant\Http\Requests\restaurant\cartaValidacion;
use restaurant\models\producto;
use restaurant\models\carta_item;
use JavaScript;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->ajax()){
            return self::activa();
        }else{
            $data = carta::getAll();
            $headers = carta::getHeaders();
            $cartaCurrent = carta::where('estado', '1')->first();
            $productos = producto::all();
            $productosActuales = carta_item::where('carta_id', $cartaCurrent->id)->get();
            JavaScript::put([
                'carta_actual' => $cartaCurrent,
                'productos_actual' => $productosActuales
            ]);
            return view('sistema.carta.index', ['data' => $data, 'title' => 'CARTA', 'action' => '/carta', 'headers' => $headers, 'carta_activa' => $cartaCurrent, 'productos' => $productos, 'productos_actual' => $productosActuales]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = carta::getPull();
        $tipos = tipo_carta::all();
        return view('sistema.carta.crear', ['title' => 'CARTA', 'action' => '/carta', 'headers' => $headers, 'tiposCarta' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cartaValidacion $request)
    {
        $c = new carta();
        $c->version = $request->version;
        $c->estado = FALSE;
        $c->tipo_carta_id = $request->tipoCarta;
        $c->save();
        return redirect('/sistema/carta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cartaCurrent = carta::where('estado','1')->first();
        // return $cartaCurrent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = new carta($id);
        $data = $c->getOne();
        $headers = $c->getPull();
        $tipos = tipo_carta::all();
        return view('sistema.carta.editar', ['title' => "CARTA - EDITAR", 'action' => '/carta/' . $id, 'data' => $data, 'headers' => $headers, 'tiposCarta' => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $tipo = tipo_carta::find($request->tipoCarta);
        $c = carta::find($id);
        $c->version = $request->version;
        $c->estado = $request->estado;
        $c->tipo_carta_id = $request->tipoCarta;
        $c->save();
        // return $c;

        return redirect('/sistema/carta');
    }
    /**
     * CAMBIAMOS EL ESTADO DE LA CARTA
     */
    public function changeEstado(Request $request)
    {
        $c1 = carta::where('estado', 1)->first();
        if ($c1 != null) {
            $c1->update(['estado' => 0]);
        }
        carta::where('id', $request->id)->update(['estado' => 1]);
        return $c1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = carta::find($id);
        $c->delete();
        return redirect('/sistema/carta')->with("success", "Carta Eliminada");
    }
    public function activa()
    {
        $cartaCurrent = carta::where('estado', '1')->first();
        return $cartaCurrent->getProductos;
    }
    public function instanciando(Request $request)
    {
        $data = null;
        if(!empty($request->productos)){
            foreach ($request->productos as $prod) {
                $aux = carta_item::where('carta_id', $prod['carta_id'])->where('producto_id', $prod['producto_id'])->first();
                if ($aux) {
                    $c_i = carta_item::find($aux->id);
                    $c_i->stock = $prod['stock'];
                    $c_i->save();
                } else {
                    carta_item::create($prod);
                }
            }
        }
    }
    public function renovando(Request $request)
    {
        $aux = carta_item::where('carta_id', $request['carta_id'])->where('producto_id', $request['producto_id'])->first();
        $aux->delete();
    }
}
