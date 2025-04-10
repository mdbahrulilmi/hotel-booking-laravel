<div class="max-w-4xl">
    <div>
        <div class="flex justify-between items-center mb-4">
            <div class="px-4 sm:px-0">
                <h3 class="text-base/7 font-semibold text-gray-900">Rooms Table</h3>
                <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Hotel details and application.</p>
            </div>
            <a href="{{route('rooms.create')}}"
            class="bg-blue-600 text-white px-3 py-2 text-sm rounded hover:bg-blue-700 transition">
           Add Room
         </a>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">Room</th>
                <th class="px-4 py-2 text-left">Price / Night</th>
                <th class="px-4 py-2 text-left">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-2 border-b ">1</td>
                <td class="px-4 py-2 border-b ">Deluxe Room</td>
                <td class="px-4 py-2 border-b ">Rp 500.000</td>
                <td class="px-4 py-2 border-b">
                  <button class="text-blue-600 hover:underline mr-2 font-normal">Edit</button>
                  <button class="text-red-600 hover:underline">Delete</button>
                </td>
              </tr>
              <!-- Tambah baris lain di sini -->
            </tbody>
          </table>
        </div>
      </div>
      
    <div> 
</div>
