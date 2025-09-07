<?php

namespace App\Http\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use Livewire\Component;
use App\Factories\CartFactory;


class Cart extends Component
{
    public function checkout(CreateStripeCheckoutSession $checkoutSession) 
    {
        return $checkoutSession->createFromCart($this->cart);

    }

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }
    public function getItemsProperty()
    {
        return $this->cart->items;
    }
    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)?->increment(column: 'quantity');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);
        if ($item->quantity > 1) {
            $item->decrement(column: 'quantity');
        }
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();
        $this->emit('productRemovedToCart');
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
