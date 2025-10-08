<?php

namespace App\Livewire\Menus;

use App\Models\Menu;
use Livewire\Component;

class Todos extends Component
{
    public $menus;

    public function mount(){
        $this->menus = Menu::all();
    }
    public function render()
    {
        return view('livewire.menus.todos');
    }
}
