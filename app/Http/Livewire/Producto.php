<?php

namespace App\Http\Livewire;

use App\Models\Producto as ModelsProducto;
use Livewire\Component;
use Livewire\WithPagination;

class Producto extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $count = 0;
    public $search = '';
    
    public function render()
    {
        $productos_livewire = ModelsProducto::where('nombre', 'like', "%".$this->search."%")->paginate(3);
        return view('livewire.producto', ["productos_livewire" => $productos_livewire]);
    }

 
    public function increment()
    {
        $this->count++;
    }
 
}
