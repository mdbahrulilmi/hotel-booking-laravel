<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main class="{{ request()->routeIs('messages.message') ? '!p-0' : 'p-6' }}">
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
