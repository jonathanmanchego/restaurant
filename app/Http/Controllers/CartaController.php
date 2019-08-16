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
    public function index()
    {
        $data = carta::getAll();
        $headers = carta::getHeaders();
        $cartaCurrent = carta::where('estado','1')->first();
        $productos = producto::all();
        JavaScript::put([
            'carta_actual' => $cartaCurrent,
            // 'productos' => $productos
		]);
        return view('sistema.carta.index', ['data' => $data, 'title' => 'CARTA', 'action' => '/carta', 'headers' => $headers,'carta_activa' => $cartaCurrent,'productos' => $productos]);
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
    public function activa(){
        $cartaCurrent = carta::where('estado','1')->first();
        return $cartaCurrent;
    }
    public function instanciando(Request $request){
        foreach($request->productos as $prod){
            carta_item::create($prod); 
        }
        // carta_item::create($request->all());
        //return $request->input('carta_id') ." - ".$request->input('producto_id') ." - " .$request->input('stock');
    }
}
