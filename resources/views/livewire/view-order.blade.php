<div class="grid grid-cols-2 gap-4">
    <x-panel class="mt-12 col-span-2" title="Your Order #{{ $this->order->id }}">
   <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Product</th>
                        <th class="px-6 py-3 text-right">Quantity</th>
                        <th class="px-6 py-3 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($this->order->items as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $item->name }} <br>
                                {{ $item->description }}
                            </td>

                            <td class="px-6 py-4 text-right text-gray-600">
                                {{ $item->quantity }}
                            </td>

                            <td class="px-6 py-4 text-right font-semibold text-gray-900">
                                ${{ number_format($item->amount_total->getAmount() / 100, 2) }}
                            </td>
                        </tr>
                    @endforeach
@if ($this->order->amount_shipping->isPositive())

                    <tr class="bg-gray-100 font-semibold">
                        <td colspan="4" class="px-6 py-4 text-right">Shipping</td>
                        <td class="px-6 py-4 text-right text-gray-900">
                            ${{ number_format($this->order->amount_shipping->getAmount() / 100, 2) }}
                        </td>
                        <td></td>
                    </tr>
@endif
@if ($this->order->amount_discount->isPositive())
                      <tr class="bg-gray-100 font-semibold">
                        <td colspan="4" class="px-6 py-4 text-right">Discount</td>
                        <td class="px-6 py-4 text-right text-gray-900">
                            ${{ number_format($this->order->amount_discount->getAmount() / 100, 2) }}
                        </td>
                        <td></td>
                    </tr>
@endif
@if ($this->order->amount_tax->isPositive())
                      <tr class="bg-gray-100 font-semibold">
                        <td colspan="4" class="px-6 py-4 text-right">Tax</td>
                        <td class="px-6 py-4 text-right text-gray-900">
                            ${{ number_format($this->order->amount_tax->getAmount() / 100, 2) }}
                        </td>
                        <td></td>
                    </tr>
@endif
                    @if ($this->order->amount_subtotal->isPositive())
                        <tr class="bg-gray-100 font-semibold">
                        <td colspan="4" class="px-6 py-4 text-right">SubTotal</td>
                        <td class="px-6 py-4 text-right text-gray-900">
                            ${{ number_format($this->order->amount_subtotal->getAmount() / 100, 2) }}
                        </td>
                        <td></td>
                    </tr>
                    @endif
                    @if ($this->order->amount_total->isPositive())
                    <tr class="bg-gray-100 font-semibold">
                        <td colspan="4" class="px-6 py-4 text-right">Total</td>
                        <td class="px-6 py-4 text-right text-gray-900">
                            ${{ number_format($this->order->amount_total->getAmount() / 100, 2) }}
                        </td>
                        <td></td>
                    </tr>
 @endif
                </tbody>
            </table>
    </x-panel>
<x-panel class="col-span-1" title="Billing Information">
    @foreach($this->order->billing_address->filter() as $value)
        {{ $value }} <br>
    @endforeach
</x-panel>

<x-panel class="col-span-1" title="Shipping Information">
    @foreach($this->order->shipping_address->filter() as $value)
        {{ $value }} <br>
    @endforeach
</x-panel>

</div>
