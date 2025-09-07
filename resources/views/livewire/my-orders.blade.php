<x-panel title="My Orders" class="max-w-lg my-auto mt-12">
    <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-6 py-3">Order</th>
                <th class="px-6 py-3">Ordered at</th>
                <th class="px-6 py-3 text-right">Total</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($this->orders as $order)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <a href="{{ route('view-order', $order->id) }}" class="underline font-medium">
                            #{{ $order->id }}
                        </a> 
                    </td>

                    <td class="px-6 py-4 text-right text-gray-600">
                        {{ $order->created_at->diffForHumans() }}
                    </td>

                    <td class="px-6 py-4 text-right font-semibold text-gray-900">
                        ${{ number_format($order->amount_total->getAmount() / 100, 2) }}
                    </td>
                </tr>
            @endforeach

            <tr class="bg-gray-100 font-semibold">
                <td colspan="2" class="px-6 py-4 text-right">Total</td>
                <td class="px-6 py-4 text-right text-gray-900">
                    ${{ number_format($this->orders->sum(fn($order) => $order->amount_total->getAmount()) / 100, 2) }}
                </td>
            </tr>
        </tbody>
    </table>
</x-panel>
