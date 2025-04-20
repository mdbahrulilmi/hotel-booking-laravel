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
                    @livewire('payment')
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">Checkout</button>
            </div>
        </div>
    </form>
</div>
