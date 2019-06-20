<?php

namespace restaurant\Http\Controllers\Admin;

use Illuminate\Http\Request;
use restaurant\Http\Controllers\Controller;
use restaurant\Models\Admin\TipoUsuario;
use restaurant\Models\Admin\Menu;

class MenuTipoUsuarioController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = TipoUsuario::orderBy('id')->pluck('nombre', 'id')->toArray();//obtener roles- se puede usar get
        $menus = Menu::getMenu();
        $menusRols = Menu::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('admin.menu-rol.index', compact('rols', 'menus', 'menusRols'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
