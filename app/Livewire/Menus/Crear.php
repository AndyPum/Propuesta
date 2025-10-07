<?php

namespace App\Livewire\Menus;

use App\Models\Ingrediente;
use App\Models\Menu;
use Livewire\Component;

class Crear extends Component
{
    public $nombre_menu;
    public $precio_menu = 0;
    public $categoria_menu;
    public $ingredientes_menu = [];
    public $ingredientes;

    public function mount()
    {
        $this->ingredientes = Ingrediente::all();
    }

    public function rules()
    {
        return [
            'nombre_menu' => 'required|string|max:255',
            'categoria_menu' => 'required|string|max:100',
            'precio_menu' => 'nullable|numeric|min:0',
            'ingredientes_menu' => 'nullable|array',
            'ingredientes_menu.*.nombre' => 'required|string|max:255',
            'ingredientes_menu.*.cantidad' => 'required|numeric|min:0',
        ];
    }

    public function submit()
    {
        
        $this->validate();

        $menu = Menu::create([
            'nombre' => $this->nombre_menu,
            'categoria' => $this->categoria_menu,
            'precio' => $this->precio_menu,
            'ingredientes' => $this->ingredientes_menu,
        ]);

        $this->reset(['nombre_menu', 'categoria_menu', 'precio_menu', 'ingredientes_menu']);

        return redirect()->route('menus');
    }

    public function render()
    {
        return view('livewire.menus.crear');
    }
}
