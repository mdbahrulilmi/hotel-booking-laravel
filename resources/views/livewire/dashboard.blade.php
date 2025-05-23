<div     :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl max-w-4xl">

        {{-- Welcome Section --}}
        <div class="p-6 bg-white dark:bg-neutral-900 rounded-xl shadow-sm">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back, {{ Auth::user()->name ?? ''}} 👋</h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400 mt-1">Here’s a summary of your bookings.</p>
        </div>

        {{-- My Bookings Summary --}}
        <div class="grid gap-4 md:grid-cols-2">
            <div class="bg-white dark:bg-neutral-900 rounded-xl p-6 shadow-sm border border-neutral-200 dark:border-neutral-700">
                <label class="text-sm text-gray-500 dark:text-neutral-400 font-medium">Total Bookings</label>
                <h1 class="text-5xl font-bold text-gray-900 dark:text-whit  e mt-4">{{count($booking)}}</h1>
            </div>
            <div class="bg-white dark:bg-neutral-900 rounded-xl p-6 shadow-sm border border-neutral-200 dark:border-neutral-700">
                <label class="text-sm text-gray-500 dark:text-neutral-400 font-medium">Upcoming Booking</label>
                <div class="mt-4 text-gray-800 dark:text-neutral-200">
                    <p class="font-medium">{{$booking->first()->room->hotel->name ?? ''}}</p>
                    <p class="text-sm">{{$booking->first()->check_in ?? ''}}</p>
                    <span class="inline-flex mt-2 rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">{{$booking->first()->status ?? ''}}</span>
                </div>
            </div>
        </div>

        {{-- Booking Table --}}
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-sm p-6 border border-neutral-200 dark:border-neutral-700">
            <h2 class="text-base/7 font-semibold text-gray-900 dark:text-white mb-4">Your Bookings</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-neutral-800">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-neutral-300">Property</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-neutral-300">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-neutral-300">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach ($booking as $item)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">{{$item->room->hotel->name}}</td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">{{$item->check_in}}</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">{{$item->status}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="mt-4 text-right">
            <a href="" class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-white text-sm font-semibold hover:bg-blue-700">
                + New Booking
            </a>
        </div>
    </div>
</div   >
