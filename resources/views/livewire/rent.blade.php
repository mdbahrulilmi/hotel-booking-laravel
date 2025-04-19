<div>
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Available Room</h1>
    </div>

    <!-- Grid Card Room -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach ($room as $item)
      <?php 
        $images = json_decode($item->images)
        ?>
     
      <div class="bg-white rounded-2xl shadow hover:shadow-lg transition">
        <img src="{{Storage::url($images[0])}}" alt="Room Image" class="rounded-t-2xl w-full h-48 object-cover">
        <div class="p-4 space-y-2">
          <h2 class="text-lg font-semibold text-gray-800">{{$item->name}}</h2>
          <p class="text-gray-600">{{$item->price_per_night}}</p>
          <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{$item->status}}</span>
          <div class="flex justify-end gap-2 mt-4">
              <a href="{{route('rooms.detail',$item->id)}}">
                <button class="text-sm bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Check</button>
              </a>
          </div>
        </div>
      </div>
     
      @endforeach
    </div>
  </div>

</div>
