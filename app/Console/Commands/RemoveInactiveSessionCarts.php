<?php

namespace App\Console\Commands;

use App\Http\Livewire\Cart;
use Illuminate\Console\Command;

class RemoveInactiveSessionCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove carts associated with inactive sessions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $carts = Cart::whereDoesntHave('user')->whereDate('created_at', '<', now()->subDay())->get();

        foreach ($carts as $cart) {
            $cart->items()->delete();
            $cart->delete();
        }
    }
}
