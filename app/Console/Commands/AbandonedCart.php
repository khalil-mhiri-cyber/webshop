<?php

namespace App\Console\Commands;

use App\Http\Livewire\Cart;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\AbandonedCartReminder;

class AbandonedCart extends Command
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
    protected $description = 'Look for abandoned carts and notify their owners';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $carts = Cart::withWhereHas('user')->whereDate('updated_at', today()->subDay())->get();
        foreach ($carts as $cart) {
            Mail::to($cart->user)->send(new AbandonedCartReminder($cart));
            
        }
    }
}
