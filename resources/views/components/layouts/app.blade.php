<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main class="{{ request()->routeIs('messages.message') ? '!p-0' : 'p-6' }}">
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
