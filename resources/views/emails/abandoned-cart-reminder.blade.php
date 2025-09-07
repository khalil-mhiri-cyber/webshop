@component('mail::message')
Hey {{ $order->user->name }},

Thank you for your order. You find all the details below.

@component('mail::table')
| Item | Description | Price | Quantity | Tax | Total |
|------|-------------|-------|----------|-----|-------|
@foreach ($order->items as $item)
| {{ $item->name }} | {{ $item->description }} | {{ $item->price }} | {{ $item->quantity }} | {{ $item->amount_tax }} | {{ $item->amount_total }} |
@endforeach
@endcomponent

@if ($order->amount_shipping->isPositive())
**Shipping costs:** {{ $order->amount_shipping }}
@endif

@if ($order->amount_discount->isPositive())
**Discount:** {{ $order->amount_discount }}
@endif

@if ($order->amount_tax->isPositive())
**Tax:** {{ $order->amount_tax }}
@endif

@if ($order->amount_subtotal->isPositive())
**Subtotal:** {{ $order->amount_subtotal }}
@endif

@if ($order->amount_total->isPositive())
**Total:** {{ $order->amount_total }}
@endif
Thanks again for your purchase!
@component('mail::button', ['url' => route('view-order',$order->id), 'color' => 'success'])
View Order
@endcomponent

@endcomponent
