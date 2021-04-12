<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Footer extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.footer', compact('categories'));
    } 
}
