<div class="max-w-2xl flex flex-col h-screen">

  <!-- Header -->
  <div class="px-4 py-3 border-b flex items-center gap-3">
      <img src="{{ $recv->images ?? '' }}" class="w-10 h-10 rounded-full" />
      <div>
          <p class="font-semibold text-gray-800">{{ $recv->name }}</p>
          <p class="text-sm text-green-500">Online</p>
      </div>
  </div>

  <!-- Area Pesan -->
  <div class="flex-1 overflow-y-auto px-4 py-4 space-y-4" wire:poll.3s>
      @foreach($allMessages as $msg)
          @if($msg->send_id === auth()->id())
              <div class="flex justify-end">
                  <div class="bg-blue-600 text-white p-3 rounded-2xl shadow-md max-w-[75%]">
                      <p>{{ $msg->message }}</p>
                      <span class="text-xs text-white/80 block mt-1 text-right">
                          {{ $msg->created_at->format('H:i') }}
                      </span>
                  </div>
              </div>
          @else
              <div class="flex items-start gap-2">
                  <img src="https://i.pravatar.cc/40?u={{ $msg->send_id }}" alt="Avatar"
                       class="w-8 h-8 rounded-full">
                  <div class="bg-white text-gray-800 p-3 rounded-2xl shadow-md max-w-[75%]">
                      <p>{{ $msg->message }}</p>
                      <span class="text-xs text-gray-400 block mt-1">
                          {{ $msg->created_at->format('H:i') }}
                      </span>
                  </div>
              </div>
          @endif
      @endforeach
  </div>

  <!-- Input Pesan (Fixed di bawah) -->
  <div class="px-4 py-3 bg-white border-t">
      <form wire:submit='create' class="flex items-center gap-3">
          <input
              type="text"
              placeholder="Tulis pesan..."
              wire:model="message"
              class="flex-1 px-4 py-2 text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
          />
          <button
              type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2 rounded-full transition"
          >
              Kirim
          </button>
      </form>
  </div>
</div>
