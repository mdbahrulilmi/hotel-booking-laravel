<div class="max-w-4xl">

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6 shadow-sm">
                <div class="absolute top-4 left-6">
                    <label class="text-sm text-gray-500 dark:text-neutral-400 font-medium">Balance</label>
                </div>
                <div class="flex justify-start items-center h-full">
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white">$5,000</h1>
                </div>
            </div>

            <div class="relative aspect-video overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6 shadow-sm">
                <div class="absolute top-4 left-6">
                    <label class="text-sm text-gray-500 dark:text-neutral-400 font-medium">Total Bookings</label>
                </div>
                <div class="flex justify-start items-center h-full">
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white">134</h1>
                </div>
            </div>

            <div class="relative aspect-video overflow-hidden rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6 shadow-sm">
                <div class="absolute top-4 left-6">
                    <label class="text-sm text-gray-500 dark:text-neutral-400 font-medium">Incoming Bookings</label>
                </div>
                <div class="flex justify-start items-center h-full">
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white">12</h1>
                </div>
            </div>
        </div>

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Incoming Bookings</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-neutral-800">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-neutral-300">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-neutral-300">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-neutral-300">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">John Doe</td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">April 11, 2025</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Confirmed
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">Jane Smith</td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">April 12, 2025</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">Michael Jordan</td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">April 13, 2025</td>
                            <td class="px-4 py-2 text-sm">
                                <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-200">
                                    Cancelled
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
    <div class="relative aspect-video rounded-2xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-6 shadow-sm">
        <div class="flex justify-between items-center mt-6">
            <div class="px-4 sm:px-0">
                <h3 class="text-2xl font-semibold text-gray-900">Hotel Information</h3>
                <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Hotel details and application.</p>
            </div>
            <a href="{{route('hotels.update')}}"
            class="bg-yellow-600 text-white px-3 py-2 text-sm rounded hover:bg-blue-700 transition">
        Update Information
        </a>
        </div>
        
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Hotel Name</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$myHotel->name}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Hotel Code</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$myHotel->code}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Street Address for</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$myHotel->street_address}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">City/State/Postal Code</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$myHotel->city}}/{{$myHotel->state}}/{{$myHotel->postal_code}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Phone Number</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$myHotel->phone_number}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Description</dt>
                <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{$myHotel->description}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm/6 font-medium text-gray-900">Images</dt>
                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                    <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                    <div class="flex w-0 flex-1 items-center">
                        <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                        <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                        <span class="shrink-0 text-gray-400">2.4mb</span>
                        </div>
                    </div>
                    <div class="ml-4 shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                    </div>
                    </li>
                    <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                    <div class="flex w-0 flex-1 items-center">
                        <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                        <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                        <span class="shrink-0 text-gray-400">4.5mb</span>
                        </div>
                    </div>
                    <div class="ml-4 shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                    </div>
                    </li>
                </ul>
                </dd>
            </div>
            </dl>
        </div>
    </div>
</div>
         
</div>
