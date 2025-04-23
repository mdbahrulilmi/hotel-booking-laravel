<div class="max-w-4xl">
    <h2 class="text-base/7 font-semibold text-gray-900 mb-4">All Users</h2>

    <table class="w-full table-auto border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Type</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh isi -->
            @foreach ($users as $item)
            <tr>
                <td class="px-4 py-2 border-t">{{$loop->iteration}}</td>
                <td class="px-4 py-2 border-t">{{$item->id}}</td>
                <td class="px-4 py-2 border-t">{{$item->name}}</td>
                <td class="px-4 py-2 border-t">{{$item->email}}</td>
                <td class="px-4 py-2 border-t">
                            <div x-data="{ open: false, selected: '{{$item->type}}' }" class="relative">
                                <button @click="open = !open" class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs font-medium">
                                    <span x-text="selected"></span>
                                </button>
                                <div x-show="open" @click.outside="open = false" class="absolute z-10 mt-2 w-28 bg-white rounded shadow border">
                                    <ul class="text-sm">
                                        <li>
                                            <a href="#"
                                               wire:click="updateType({{ $item->id }}, 'guest')"
                                               @click="selected = 'guest'; open = false"
                                               class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">guest</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               wire:click="updateType({{ $item->id }}, 'owner')"
                                               @click="selected = 'owner'; open = false"
                                               class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">owner</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               wire:click="updateType({{ $item->id }}, 'admin')"
                                               @click="selected = 'admin'; open = false"
                                               class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                <td class="px-4 py-2 border-t">  
                <a href="#"><button class="text-red-600 hover:underline">Deactive</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
