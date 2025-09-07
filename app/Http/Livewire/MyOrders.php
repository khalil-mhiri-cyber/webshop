<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;


class MyOrders extends Component
{

    public function getOrdersProperty()
    {
        return auth()->user()->orders;
    }
    public function render()
    {
        return view('livewire.my-orders');
    }
}
