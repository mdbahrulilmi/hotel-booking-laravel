<div>
    <div class="max-w-6xl mx-auto p-6 space-y-6">
        <div class="flex justify-between items-start">
          <div>
              <h1 class="text-m font-bold text-gray-400">{{$room->type}}</h1>
            <h1 class="text-3xl font-bold text-gray-900">{{$room->name}}</h1>
            <p class="{{($room->status === 'active' ? 'text-green-500' : 'text-red-500')}}">{{$room->status}}</p>
          </div>
          <div class="text-right">
            <span class="text-xl font-semibold text-indigo-600">${{$room->price_per_night}}</span>
          </div>
        </div>
      
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach (json_decode($room->images) as $item)
            <img src="{{Storage::url($item)}}" class="rounded-lg object-cover w-full h-48 shadow" alt="Room Image {{$loop->iteration}}">
            @endforeach
        </div>
      
        <div class="bg-white border rounded-lg shadow p-6">
          <h2 class="text-2xl font-semibold text-gray-800 mb-3">Description</h2>
          <p class="text-gray-700 leading-relaxed">
            {{$room->description}}
          </p>
        </div>
        <div class="bg-gray-50 border rounded-lg p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-3">Facilities</h3>
          <ul class="grid grid-cols-2 md:grid-cols-3 gap-y-2 text-gray-600 list-disc list-inside">
            @foreach (json_decode($room->facilities) as $item)
            <li>{{$item}}</li>
            @endforeach
          </ul>
        </div>
      
        <!-- Tombol Aksi -->
        <div class="flex justify-end">
          <a href="{{route('messages.message',[$owner,$room->id])}}"><button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow mr-3">
            Message
          </button></a>
          <a href="{{route('bookings.create',[$room->id])}}"><button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
            Booking Now
          </button></a>
        </div>
      </div>
      
</div>
