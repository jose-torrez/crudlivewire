<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Productos extends Component
{
    public $productos, $id_producto, $descripcion, $cantidad;
    public $modal = false;
    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.productos');
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function limpiarCampos()
    {
        $this->descripcion = null;
        $this->cantidad = null;
        $this->id_producto = null;
    }
    public function abrirModal()
    {
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
}
