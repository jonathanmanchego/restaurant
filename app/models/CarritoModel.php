<?php

namespace restaurant\Models;

// use Illuminate\Database\Eloquent\Model;
use restaurant\Models\producto;
use restaurant\models\estado_ordenes;
use restaurant\models\orden;
use restaurant\models\tipo_orden;
use restaurant\models\empleado;
use restaurant\models\carta_item;
use restaurant\models\carta;
use Auth;
class CarritoModel
{
	private $productos = array();
	private $cantidadItems; ///CANTIDAD DE PRODUCTOS EN UNIDADES
	private $cantidadTotal; //CANTIDAD DE PRODUCTOS POR VARIEDAD
	private $total; //SUMA TOTAL DE PRECIOS
	public function __construct()
	{
		$this->total = 0;
		$this->cantidadItems = 0;
		$this->cantidadTotal = 0;
	}
	public function addItem(producto $producto, $cant)
	{

		$N = $this->verifiyItem($producto->id);
		if ($N != -1) {
			$this->productos[$N]->total += $cant;
			$this->productos[$N]->subTotal += $cant * $producto->precio;
			$this->cantidadItems += $cant;
			$this->total += $cant * $producto->precio;
		} else {
			$producto->total += 1;
			$producto->subTotal = $cant * $producto->precio;
			$producto->comentario = "nada";
			$this->total += $producto->subTotal;
			$this->productos[] = $producto;
			$this->cantidadTotal += 1;
			$this->cantidadItems += 1;
		}
	}
	public function removeItem(producto $producto, $cant)
	{
		$N = $this->verifiyItem($producto->id);
		if ($N != -1) {
			if ($cant >= $this->productos[$N]->total) {
				$this->cantidadItems -= $cant;
				$this->total -= $cant * $producto->precio;
				unset($this->productos[$N]);
				$this->cantidadTotal -= $cant;
				return array('out' => "redirect");
			} else {
				$this->productos[$N]->total -= $cant;
				$this->productos[$N]->subTotal -= $cant * $producto->precio;
			}
			$this->cantidadItems -= $cant;
			$this->total -= $cant * $producto->precio;
		}
		return array('out' => "success");
	}
	public function removeProducto(producto $prod){
		$N = $this->verifiyItem($prod->id);
		if($N != -1){
			$this->cantidadItems -= $this->productos[$N]->total;
			$this->cantidadTotal--;
			$this->total -= $this->productos[$N]->subTotal;
			unset($this->productos[$N]);
		}
		return array('out' => "success");
	}
	public function saveProductos(){
		$tipo_orden = tipo_orden::where('nombre','DELIVERY')->first();
        $mesa = mesa::where('nombre','DELIVERY')->first();
		$estado = estado_ordenes::where('nombre','PREPARANDOSE')->first();////LUEGO HAREMOS QUE LAS ORDENES SIEMPRE ESTEN ORDENADAS DE LA PRIMERA = PASO 1 ...
		$cartaActiva = carta::where('estado', 1)->first();
        $orden = new orden();
        $orden->tipo_orden_id = $tipo_orden->id;
        $orden->mesa_id = $mesa->id;
        $orden->total = $this->total;
        $orden->total_redondeado = $this->total;
        $orden->comprobante = 0;////ESTE VALOR SE OBTENDRA DEL SISTEMA DE FACTURAS ELECTRONICAS
        $orden->tiempo_espera_total = $this->tiempoEspera();
		$orden->estado_ordenes_id = $estado->id;
		$emp = empleado::where('nombre','DELIVERY')->first();////DEBEMOS TENER UN EMPLEADO QUE SE LLAME DELIVERY
        $orden->empleado_usuario_id = $emp->id;
        $orden->usuario_id = Auth::user()->id;
        $orden->save();
		foreach($this->productos as $key => $item){
            $det_orden = new detalle_orden();
            $det_orden->producto_id = $item->id;
            $det_orden->orden_id = $orden->id;
            $det_orden->cantidad = $item->total;
            $det_orden->subtotal = $item->subTotal;
            $det_orden->promociones_id = null;
            $det_orden->comentario = $item->comentario;
			$det_orden->save();
			$item_to_process = carta_item::where('carta_id',$cartaActiva->id)->where('producto_id',$item['id'])->first();
            $item_to_process->stock -=  $item->total;
            $item_to_process->save();
        }
	}
	public function tiempoEspera(){
		$total = 0;
		foreach($this->productos as $prod){
			$total += $prod->tiempo_espera;
		}
		return $total;
	}
	public function getItem()
	{
		return $this->cantidadItems;
	}
	public function getCantidad()
	{
		return $this->cantidadTotal;
	}
	public function getProductos()
	{
		return $this->productos;
	}
	public function getTotal()
	{
		return $this->total;
	}
	public function reset()
	{
		$this->productos = array();
		$this->cantidadItems = 0;
		$this->cantidadTotal = 0;
		$this->total = 0;
	}
	private function verifiyItem($id)
	{
		for ($i = 0; $i < $this->cantidadTotal; $i++) {
			if ($this->productos[$i]->id == $id) {
				return $i;
			}
		}
		return -1;
	}
}
