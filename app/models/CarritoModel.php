<?php

namespace restaurant\Models;

// use Illuminate\Database\Eloquent\Model;
use restaurant\Models\producto;

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
	public function removeItemtest001(producto $producto, $cant)
	{
		$N = $this->verifiyItem($producto->id);
		if ($N != -1) {
			if ($cant >= $this->productos[$N]->total) {
				$this->cantidadItems -= $this->cantidadItems;
				$this->total -= $this->cantidadItems * $producto->precio;
				unset($this->productos[$N]);
				$this->cantidadTotal -= $this->cantidadItems;
				return array('out' => "redirect");
			} else {
				$this->productos[$N]->total -= $this->cantidadItems;
				$this->productos[$N]->subTotal -= $this->cantidadItems * $producto->precio;
			}
			$this->cantidadItems -= $this->cantidadItems;
			$this->total -= $this->cantidadItems * $producto->precio;
		}
		return array('out' => "success");
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
