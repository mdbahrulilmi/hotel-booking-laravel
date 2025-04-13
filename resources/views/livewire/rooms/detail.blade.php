<div>
    <div class="max-w-6xl mx-auto p-6 space-y-6">
        <!-- Judul dan Info Harga -->
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
      
        <!-- Galeri Gambar -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach (json_decode($room->images) as $item)
            <img src="{{Storage::url($item)}}" class="rounded-lg object-cover w-full h-48 shadow" alt="Room Image {{$loop->iteration}}">
            @endforeach
        </div>
      
        <!-- Deskripsi -->
        <div class="bg-white border rounded-lg shadow p-6">
          <h2 class="text-2xl font-semibold text-gray-800 mb-3">Deskripsi Kamar</h2>
          <p class="text-gray-700 leading-relaxed">
            {{$room->description}}
          </p>
        </div>
        <div class="bg-gray-50 border rounded-lg p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-3">Fasilitas</h3>
          <ul class="grid grid-cols-2 md:grid-cols-3 gap-y-2 text-gray-600 list-disc list-inside">
            @foreach (json_decode($room->facilities) as $item)
            <li>{{$item}}</li>
            @endforeach
          </ul>
        </div>
      
        <!-- Info Tambahan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="p-4 bg-white border rounded-lg shadow">
            <p class="text-sm text-gray-500">Ukuran Kamar</p>
            <p class="text-lg font-medium text-gray-800">32 m²</p>
          </div>
          <div class="p-4 bg-white border rounded-lg shadow">
            <p class="text-sm text-gray-500">Tipe Kasur</p>
            <p class="text-lg font-medium text-gray-800">1 Queen Bed</p>
          </div>
        </div>
      
        <!-- Tombol Aksi -->
        <div class="flex justify-end">
          <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
            Booking Sekarang
          </button>
        </div>
      </div>
      
</div>
