<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class StoreFront extends Component
{
    public function getProductsProperty()
{
    return Product::query()->get();
}

    public function render()
    {
        return view('livewire.store-front');
    }
}
