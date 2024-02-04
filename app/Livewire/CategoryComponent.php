<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-component',['categories' => $categories]);
    }
}
