<?php

namespace App\Http\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;
    public $productId;
    public $variant;
    public $rules = [
        'variant' => ['required','exists:App\Models\ProductVariant,id']
    ];
    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }
    public function addToCart(AddProductVariantToCart $Cart)
    {
        $this->validate();
        $Cart->add(
            variantId: $this->variant,
        );
        $this->banner('Product added to your cart!');
        $this->emit('productAddedToCart');
    }
    public function getProductProperty()
    {
        return \App\Models\Product::findOrFail($this->productId);
    }
    public function render()
    {
        return view('livewire.product');
    }
}
