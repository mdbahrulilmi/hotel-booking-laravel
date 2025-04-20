<div class="mt-8">
    <label class="block text-sm font-medium text-gray-900 mb-2">Payment Method</label>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        @foreach (['credit_card' => 'Credit Card', 'bank_transfer' => 'Bank Transfer', 'ewallet' => 'E-Wallet', 'cash' => 'Qris'] as $key => $label)
            <div wire:click="$set('payment_method', '{{ $key }}')"
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
                    <input type="radio" id="bri" wire:model="bank_option" value="bri" class="mr-2">
                    <label for="bri" class="text-sm text-gray-700">BRI</label>
                </div>
                <div>
                    <input type="radio" id="bni" wire:model="bank_option" value="bni" class="mr-2">
                    <label for="bni" class="text-sm text-gray-700">BNI</label>
                </div>
                <div>
                    <input type="radio" id="bni" wire:model="bank_option" value="bni" class="mr-2">
                    <label for="bni" class="text-sm text-gray-700">BCA</label>
                </div>
                <div>
                    <input type="radio" id="mandiri" wire:model="bank_option" value="mandiri" class="mr-2">
                    <label for="mandiri" class="text-sm text-gray-700">Mandiri</label>
                </div>
            </div>
        </div>
    @elseif ($payment_method === 'credit_card')
        <div class="col-span-full">
            <label class="block text-sm font-medium text-gray-900 mt-4">Select Credit Card</label>
            <div class="space-y-2">
                <div>
                    <input type="radio" id="visa" wire:model="credit_card_option" value="visa" class="mr-2">
                    <label for="visa" class="text-sm text-gray-700">Visa</label>
                </div>
                <div>
                    <input type="radio" id="mastercard" wire:model="credit_card_option" value="mastercard" class="mr-2">
                    <label for="mastercard" class="text-sm text-gray-700">MasterCard</label>
                </div>
                <div>
                    <input type="radio" id="american_express" wire:model="credit_card_option" value="american_express" class="mr-2">
                    <label for="american_express" class="text-sm text-gray-700">American Express</label>
                </div>
            </div>
        </div>
    @endif

    @if ($payment_method === 'ewallet')
        <div class="col-span-full">
            <label class="block text-sm font-medium text-gray-900 mt-4">Select E-Wallet</label>
            <div class="space-y-2">
                <div>
                    <input type="radio" id="dana" wire:model="bank_option" value="dana" class="mr-2">
                    <label for="dana" class="text-sm text-gray-700">DANA</label>
                </div>
                <div>
                    <input type="radio" id="ovo" wire:model="bank_option" value="ovo" class="mr-2">
                    <label for="ovo" class="text-sm text-gray-700">OVO</label>
                </div>
                <div>
                    <input type="radio" id="gopay" wire:model="bank_option" value="gopay" class="mr-2">
                    <label for="gopay" class="text-sm text-gray-700">GoPay</label>
                </div>
            </div>
        </div>
    @endif
</div>
