<div>
    <div>
        <form wire:submit="save" class="max-w-4xl">
            @csrf
            <div class="space-y-12">
              <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Room Information</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Any information you enter will be publicly displayed, so make sure it's perfect!</p>
          
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="col-span-full">
                    <label for="name" class="block text-sm/6 font-medium text-gray-900" >Room Name</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input type="text" name="name" id="name" wire:model="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Standard Twin Bed - 2nd Fl" value="{{$room->name}}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-span-full">
                    <label for="type" class="block text-sm/6 font-medium text-gray-900" >Room Type</label>
                    <div class="mt-2">
                      <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input type="text" name="type" id="type" wire:model="type" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Standart" value="{{$room->type}}">
                      </div>
                    </div>
                  </div>
    
                  <div class="col-span-full">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                    <div class="mt-2">
                      <textarea name="description" wire:model="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{$room->description}}</textarea>
                    </div>
                    <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences description your hotel.</p>
                  </div>
    
                  <div class="col-span-full">
                    <label for="price_per_night" class="block text-sm/6 font-medium text-gray-900">Price Night</label>
                    <div class="mt-2">
                      <input type="number" name="price_per_night" wire:model="price_per_night" id="price_per_night" autocomplete="price_per_night" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="{{$room->price_per_night}}">
                    </div>
                  </div>
    
                  <div class="col-span-full">
                    <label for="capacity" class="block text-sm/6 font-medium text-gray-900">Capacity</label>
                    <div class="mt-2">
                      <input type="number" name="capacity" wire:model="capacity" id="capacity" autocomplete="capacity" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="{{$room->capacity}}">
                    </div>
                  </div>
                  
                  <div class="col-span-full">
                    <label for="available_quantity" class="block text-sm/6 font-medium text-gray-900">Available Quantity</label>
                    <div class="mt-2">
                      <input type="number" name="available_quantity" wire:model="available_quantity" id="available_quantity" autocomplete="available_quantity" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="{{$room->available_quantity}}">
                    </div>
                  </div>
    
                  <div class="space-y-4">
                    <label for="fasilities" class="block text-sm/6 font-medium text-gray-900">Fasilities</label>
                
                    @foreach (json_decode($room->facilities) as $index => $facility)
                        <div class="flex items-center gap-1">
                            <input type="text"
                                   wire:model="facilities.{{ $index }}"
                                   class="w-xl rounded-md border border-gray-300 px-3 py-2"
                                   placeholder="Tulis fasilitas"
                                   value="{{$facility}}">
                            <button type="button"
                                    wire:click="removeFacility({{ $index }})"
                                    class="text-red-600 hover:text-red-800">
                                ✕
                            </button>
                        </div>
                    @endforeach
                
                    <button type="button"
                            wire:click="addFacility"
                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                        + Tambah Fasilitas
                    </button>
                </div>
                
                  
                @if($uploadedImages !== null)
                @foreach ($uploadedImages as $index => $item)
                  @php
                  $isTemporaryUpload = is_object($item) && method_exists($item, 'temporaryUrl');
                  @endphp
                  @if ($isTemporaryUpload)
                  <img src="{{ $item->temporaryUrl() }}" class="w-32 h-32 object-cover" />
                  @else
                      <img src="{{Storage::url($item)}}" class="w-32 h-32 object-cover" />`
                  @endif
      
              <button type="button"
                      wire:click="removeUploadedImages({{ $index }})"
                      class="text-red-600 hover:text-red-800">
                  ✕
              </button>
              @endforeach
            @endif
              <div class="col-span-full">
                <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover photo</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                  <div class="text-center">
                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm/6 text-gray-600">
                      <label for="images" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                        <span>Upload a file</span>
                        <input id="images" name="images" type="file" class="sr-only" wire:model="images" multiple>
                        <span wire:loading>Uploading...</span>
                    </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                  </div>
                </div>
              </div>  
            </div>
                </div>
              </div>
            </div>
          
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
          </form>
          
    </div>
        
</div>
