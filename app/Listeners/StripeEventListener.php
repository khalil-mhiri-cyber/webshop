<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Actions\Webshop\HandleCheckoutSessionCompleted;

class StripeEventListener
{

    public function handle($event)
    {
        if ($event->payload['type'] === 'checkout.session.completed') {
(new HandleCheckoutSessionCompleted)->handle($event->payload["data"]["object"]["id"]);

        }
    }
}
