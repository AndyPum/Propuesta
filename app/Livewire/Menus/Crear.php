<?php

namespace App\Livewire\Menus;

use App\Models\Categoria;
use App\Models\Ingrediente;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class Crear extends Component
{
    use WithFileUploads;

    public $nombre_menu;
    public $precio_menu = 0;
    public $categoria_menu;
    public $ingredientes_menu = [];
    public $ingredientes;
    public $imagen;

    public $nueva_categoria = '';
    public $categorias = [];

    public function mount()
    {
        $this->ingredientes = Ingrediente::all();
        $this->categorias = Categoria::orderBy('nombre')->get();
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
            'imagen' => 'nullable|image|max:2048',
        ];
    }

    public function agregarCategoria()
    {
        $this->validate([
            'nueva_categoria' => 'required|string|max:255|unique:categorias,nombre',
        ]);

        $categoria = Categoria::create([
            'nombre' => ucfirst($this->nueva_categoria),
        ]);

        $this->categorias = Categoria::orderBy('nombre')->get();

        $this->nueva_categoria = '';
    }

    public function submit()
    {
        $this->validate();

        $rutaImagen = null;
        if ($this->imagen) {
            $rutaImagen = $this->imagen->store('menus', 'public');
        }

        $menu = Menu::create([
            'nombre' => $this->nombre_menu,
            'categoria' => $this->categoria_menu,
            'precio' => $this->precio_menu,
            'ingredientes' => $this->ingredientes_menu,
            'imagen' => $rutaImagen,
        ]);

        $this->reset(['nombre_menu', 'categoria_menu', 'precio_menu', 'ingredientes_menu', 'imagen']);

        $this->dispatch('menu-creado');

        return redirect()->route('menus');
    }


    public function render()
    {
        return view('livewire.menus.crear');
    }
}
