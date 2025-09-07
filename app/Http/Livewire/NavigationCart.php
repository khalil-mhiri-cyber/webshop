<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Factories\CartFactory;

class NavigationCart extends Component
{
    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedToCart' => '$refresh',
]; 
    public function getCountProperty()
{
    return CartFactory::make()->items()->sum('quantity');
}

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
