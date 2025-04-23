<div class="max-w-4xl">
    <h2 class="text-base/7 font-semibold text-gray-900 mb-4">All Transaction</h2>

    <table class="w-full table-auto border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Guest</th>
                <th class="px-4 py-2 text-left">Room</th>
                <th class="px-4 py-2 text-left">Hotel</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh isi -->
            @foreach ($transaction as $item)
            <tr>
                <td class="px-4 py-2 border-t">{{$loop->iteration}}</td>
                <td class="px-4 py-2 border-t">{{$item->id}}</td>
                <td class="px-4 py-2 border-t">{{$item->user->name}}</td>
                <td class="px-4 py-2 border-t">{{$item->room->name}}</td>
                <td class="px-4 py-2 border-t">{{$item->room->hotel->name}}</td>
                <td class="px-4 py-2 border-t">
                    <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs font-medium">{{$item->status}}</span>
                </td>
                <td class="px-4 py-2 border-t">  
                <a href="#"><button class="text-red-600 hover:underline">Deactive</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
