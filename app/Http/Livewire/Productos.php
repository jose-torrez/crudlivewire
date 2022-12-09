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
        $this->productos = Producto::orderBy('id', 'asc')->get();
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
    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->id_producto = $producto->id;
        $this->descripcion = $producto->descripcion;
        $this->cantidad = $producto->cantidad;
        $this->abrirModal();
    }
    public function eliminar($id)
    {
        Producto::find($id)->delete();
        session()->flash('mensaje', 'Registro Eliminado!');
    }
    public function guardar()
    {
        Producto::updateOrCreate(['id' => $this->id_producto], [
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad
        ]);
        session()->flash(
            'mensaje',
            $this->id_producto ? 'Registro actulizado!' : 'Nuevo registro Guardado'
        );
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
