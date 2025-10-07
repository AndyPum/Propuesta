<?php

namespace App\Livewire\Menus;

use App\Models\Ingrediente;
use Livewire\Component;

class Crear extends Component
{
    public $ingredientes;

    public function mount()
    {
        $this->ingredientes = Ingrediente::all();
    }

    public function render()
    {
        return view('livewire.menus.crear');
    }
}

