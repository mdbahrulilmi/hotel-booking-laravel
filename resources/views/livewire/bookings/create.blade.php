<div>
    <form wire:submit.prevent="save" class="max-w-4xl mx-auto">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold text-gray-900">Room Information</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-900">Room Name</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $room->name }}" disabled>
                    </div>

                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-900">Room Type</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $room->type }}" disabled>
                    </div>

                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-900">Price per Night</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $room->price_per_night }}" disabled>
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-900">Check-in Date</label>
                        <input type="date" wire:model.lazy="checkin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="{{ now()->format('Y-m-d') }}">
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-900">Check-out Date</label>
                        <input type="date" wire:model.lazy="checkout" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="{{ now()->format('Y-m-d') }}">
                    </div>

                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-900">Total Price</label>
                        <div class="mt-2 rounded-md bg-gray-50 px-3 py-2 text-base text-gray-800 border border-gray-300">
                            Rp {{ number_format($totalPrice, 0, ',', '.') }}
                        </div>
                    </div>
                    </div>
                    <div class="mt-8">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Payment Method</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            @foreach (['credit_card' => 'Credit Card', 'bank_transfer' => 'Bank Transfer', 'ewallet' => 'E-Wallet', 'cash' => 'Qris'] as $key => $label)
                                <div wire:click="$set('payment_method', '{{ $key }}'); $set('payment_sub_option', null)"
                                    class="border rounded-md p-4 cursor-pointer hover:border-indigo-500 transition-all {{ $payment_method === $key ? 'border-indigo-600 ring-2 ring-indigo-200' : '' }}">
                                    <p class="text-sm text-gray-700 text-center">{{ $label }}</p>
                                </div>
                            @endforeach
                        </div>
                    
                        @if ($payment_method === 'bank_transfer')
    <div class="col-span-full">
        <label class="block text-sm font-medium text-gray-900 mt-4">Select Bank</label>
        <div class="space-y-2">
            <div>
                <input type="radio" id="bri" wire:model="payment_sub_option" value="bri" class="mr-2">
                <label for="bri" class="text-sm text-gray-700">BRI</label>
            </div>
            <div>
                <input type="radio" id="bni" wire:model="payment_sub_option" value="bni" class="mr-2">
                <label for="bni" class="text-sm text-gray-700">BNI</label>
            </div>
            <div>
                <input type="radio" id="bca" wire:model="payment_sub_option" value="bca" class="mr-2">
                <label for="bca" class="text-sm text-gray-700">BCA</label>
            </div>
            <div>
                <input type="radio" id="mandiri" wire:model="payment_sub_option" value="mandiri" class="mr-2">
                <label for="mandiri" class="text-sm text-gray-700">Mandiri</label>
            </div>
        </div>
    </div>
@elseif ($payment_method === 'credit_card')
    <div class="col-span-full">
        <label class="block text-sm font-medium text-gray-900 mt-4">Select Credit Card</label>
        <div class="space-y-2">
            <div>
                <input type="radio" id="visa" wire:model="payment_sub_option" value="visa" class="mr-2">
                <label for="visa" class="text-sm text-gray-700">Visa</label>
            </div>
            <div>
                <input type="radio" id="mastercard" wire:model="payment_sub_option" value="mastercard" class="mr-2">
                <label for="mastercard" class="text-sm text-gray-700">MasterCard</label>
            </div>
            <div>
                <input type="radio" id="american_express" wire:model="payment_sub_option" value="american_express" class="mr-2">
                <label for="american_express" class="text-sm text-gray-700">American Express</label>
            </div>
        </div>
    </div>
@elseif ($payment_method === 'ewallet')
    <div class="col-span-full">
        <label class="block text-sm font-medium text-gray-900 mt-4">Select E-Wallet</label>
        <div class="space-y-2">
            <div>
                <input type="radio" id="dana" wire:model="payment_sub_option" value="dana" class="mr-2">
                <label for="dana" class="text-sm text-gray-700">DANA</label>
            </div>
            <div>
                <input type="radio" id="ovo" wire:model="payment_sub_option" value="ovo" class="mr-2">
                <label for="ovo" class="text-sm text-gray-700">OVO</label>
            </div>
            <div>
                <input type="radio" id="gopay" wire:model="payment_sub_option" value="gopay" class="mr-2">
                <label for="gopay" class="text-sm text-gray-700">GoPay</label>
            </div>
        </div>
    </div>
@endif

                    </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Checkout</button>
            </div>
        </div>
    </form>
</div>
