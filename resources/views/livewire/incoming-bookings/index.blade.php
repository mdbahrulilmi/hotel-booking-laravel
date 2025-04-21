<div class="max-w-4xl">
    <h2 class="text-base/7 font-semibold text-gray-900 mb-4">All Bookings</h2>

    <table class="w-full table-auto border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Booking ID</th>
                <th class="px-4 py-2 text-left">Room</th>
                <th class="px-4 py-2 text-left">Guest</th>
                <th class="px-4 py-2 text-left">Check-in</th>
                <th class="px-4 py-2 text-left">Check-out</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh isi -->
            @foreach ($bookings as $item)
            <tr>
                <td class="px-4 py-2 border-t">{{$item->id}}</td>
                <td class="px-4 py-2 border-t">{{$item->user->name}}</td>
                <td class="px-4 py-2 border-t">{{$item->room->name}}</td>
                <td class="px-4 py-2 border-t">{{$item->check_in}}</td>
                <td class="px-4 py-2 border-t">{{$item->check_out}}</td>
                <td class="px-4 py-2 border-t">
                    <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs font-medium">{{$item->status}}</span>
                </td>
                <td class="px-4 py-2 border-t">
                    <a href="/invoice/{{$item->id}}"><button class="text-blue-600 hover:underline">View</button></a>    
                    <a href="/messages/{{$item->user_id}}"><button class="text-blue-600 hover:underline">Message</button></a>
                </td>
            </tr>
            @endforeach
            
            <!-- Tambahkan data booking lainnya -->
        </tbody>
    </table>

</div>
