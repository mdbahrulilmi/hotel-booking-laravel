<div class="max-w-2xl mx-auto bg-white shadow-xl rounded-xl p-8 mt-10 text-gray-800">
    <!-- Header -->
    <div class="flex justify-between items-center border-b pb-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-blue-700">INVOICE</h1>
            <p class="text-sm text-gray-500">#{{ $booking->id }}</p>
        </div>
        <div class="text-right text-sm">
            <p class="text-gray-600">Tanggal Booking:</p>
            <p class="font-semibold">{{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y') }}</p>
        </div>
    </div>

    <!-- Customer Info -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2 text-gray-700">Informasi Pelanggan</h2>
        <div class="bg-gray-50 p-4 rounded-md text-sm leading-relaxed">
            <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
            <p><strong>Email:</strong> {{ $booking->user->email }}</p>
        </div>
    </div>

    <!-- Booking Info -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2 text-gray-700">Detail Booking</h2>
        <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-md text-sm">
            <div>
                <p><strong>Hotel:</strong> {{ $booking->room->hotel->name ?? '-' }}</p>
                <p><strong>Kamar:</strong> {{ $booking->room->name }}</p>
                <p><strong>Harga / Malam:</strong> Rp{{ number_format($booking->room->price_per_night, 0, ',', '.') }}</p>
            </div>
            <div>
                <p><strong>Check-in:</strong> {{ $booking->check_in }}</p>
                <p><strong>Check-out:</strong> {{ $booking->check_out }}</p>
                <p><strong>Durasi:</strong>
                    @php
                        $days = \Carbon\Carbon::parse($booking->check_in)->diffInDays($booking->check_out);
                    @endphp
                    {{ $days }} malam
                </p>
            </div>
        </div>
    </div>

    <!-- Payment Info -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2 text-gray-700">Metode Pembayaran</h2>
        <div class="bg-gray-50 p-4 rounded-md text-sm leading-relaxed">
            <p><strong>Metode:</strong> {{ ucfirst(str_replace('_', ' ', $booking->payment_method)) }}</p>
            <p><strong>Tipe:</strong> {{ strtoupper($booking->payment_type ?? '-') }}</p>
            <p><strong>Status:</strong>
                <span class="inline-block px-2 py-1 rounded bg-green-100 text-green-700 font-medium">
                    {{ ucfirst($booking->status) }}
                </span>
            </p>
        </div>
    </div>

    <!-- Total -->
    <div class="border-t pt-4 mt-4 text-right">
        @php
            $total = $days * $booking->room->price_per_night;
        @endphp
        <p class="text-sm text-gray-500">Total</p>
        <p class="text-2xl font-bold text-blue-700">Rp{{ number_format($total, 0, ',', '.') }}</p>
    </div>
</div>
