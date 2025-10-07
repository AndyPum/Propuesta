<?php

namespace App\Livewire\Mesas;

use App\Models\Mesa;
use Livewire\Component;

class Index extends Component
{
    public function obtenerMesas()
    {
        return Mesa::all();
    }

    public function cambiarEstado($mesaID)
    {
        $mesa = Mesa::find($mesaID);

        if ($mesa) {
            $mesa->estado = $mesa->estado == 0 ? 1 : 0;
            $mesa->save();
        }
    }

    public function render()
    {
        $mesas = $this->obtenerMesas();
        return view('livewire.mesas.index', compact('mesas'));
    }
}
