<div class="grid grid-cols-4 mt-12 gap-4">
    <x-panel class="col-span-3">
        <div class="overflow-x-auto shadow rounded-lg">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Product</th>
                        <th class="px-6 py-3 text-right">Price</th>
                        <th class="px-6 py-3">Color</th>
                        <th class="px-6 py-3 text-right">Quantity</th>
                        <th class="px-6 py-3 text-right">Total</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($this->items as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $item->product->name }}
                            </td>

                            <td class="px-6 py-4 text-right text-gray-600">
                                ${{ number_format($item->product->price->getAmount() / 100, 2) }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $item->variant->color }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button wire:click="decrement({{ $item->id }})" 
                                            class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600 disabled:opacity-40"
                                            @if($item->quantity <= 1) disabled @endif>
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                             class="h-4 w-4" fill="none" 
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M20 12H4" />
                                        </svg>
                                    </button>

                                    <span class="px-2 font-semibold text-gray-800">
                                        {{ $item->quantity }}
                                    </span>

                                    <button wire:click="increment({{ $item->id }})" 
                                            class="px-2 py-1 text-white bg-green-500 rounded hover:bg-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                             class="h-4 w-4" fill="none" 
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-right font-semibold text-gray-900">
                                ${{ number_format($item->subtotal->getAmount() / 100, 2) }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <button wire:click="delete({{ $item->id }})" 
                                        class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" 
                                         class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M14.74 9l-.346 9m-4.788 0L9.21 9
                                                 m9.968-3.21c.342.052.682.107 1.022.166
                                                 M4.812 5.79c.34-.059.68-.114 1.022-.165
                                                 m3.022-.345a48.11 48.11 0 0 1 8.29 0
                                                 m3.182 1.51c.133.837.23 1.683.288 2.535
                                                 M3.25 6.26c-.06.852-.156 1.698-.289 2.535
                                                 m1.477 12.715h14.824m-12.38 0c.12-2.092.186-4.19.198-6.288
                                                 m8.564 6.288c-.12-2.092-.186-4.19-.198-6.288M10.5 11.25h3"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="bg-gray-100 font-semibold">
                        <td colspan="4" class="px-6 py-4 text-right">Total</td>
                        <td class="px-6 py-4 text-right text-gray-900">
                            ${{ number_format($this->cart->total->getAmount() / 100, 2) }}
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Guest / Auth -->
        <div class="mt-4">
            @guest
                <p>
                    Please <a href="{{ route('register') }}" class="underline">register</a> or 
                    <a href="{{ route('login') }}" class="underline">login</a> to continue
                </p>
            @endguest

            @auth
                <x-button wire:click="checkout" class="w-full justify-center mt-2">
                    Checkout
                </x-button>
            @endauth
        </div>
    </x-panel>
</div>
