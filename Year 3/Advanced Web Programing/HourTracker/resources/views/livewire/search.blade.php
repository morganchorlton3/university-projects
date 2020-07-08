<div class="relative md:mt-0">
    <input wire:model="search" type="text" class="bg-gray-800 text-sm rounded-full md:w-96 lg:w-96 sm:w-48 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline text-white" placeholder="Search">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if (strlen($search) >= 2)
        <div
            class="z-50 absolute bg-gray-800 text-sm text-white rounded mt-4 md:w-96 lg:w-96 sm:w-48"
        >
            @if ($shifts->count() > 0)
                <ul>
                    @foreach ($shifts as $shift)
                    <li class="border-b border-gray-700">
                        <a
                            href="" class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150"
                            @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                            <span class="ml-4">{{ Carbon\Carbon::parse($shift->shiftDate)->format('d F')  }}</span>
                            <span class="ml-4">Hours Worked:  {{ $shift->hoursWorked }}</span>
                        </a>
                    </li>
                    @endforeach

                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>
