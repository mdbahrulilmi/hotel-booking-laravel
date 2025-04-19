<div class="max-w-4xl">
    <div class="bg-white dark:bg-neutral-900 rounded-xl">
        <div class="px-4 py-3">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Messages</h2>
        </div>

        <ul class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach ($messages as $item)
    <a href="{{ route('messages.message', $item->send_id) }}">
        <li class="p-4 hover:bg-gray-50 dark:hover:bg-neutral-800 cursor-pointer flex items-center gap-4">
            <img src="https://i.pravatar.cc/150?u={{ $item->sender->id }}" alt="avatar" class="w-12 h-12 rounded-full object-cover">
            <div class="flex-1 min-w-0">
                <div class="flex justify-between items-center">
                    <span class="text-gray-900 dark:text-white font-medium truncate">{{ $item->sender->name }}</span>
                    <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-sm text-gray-500 dark:text-neutral-400 truncate">{{ $item->message }}</p>
            </div>
            <span class="text-xs bg-blue-600 text-white rounded-full px-2 py-0.5">3</span>
        </li>
    </a>
@endforeach

        </ul>
    </div>
</div>
