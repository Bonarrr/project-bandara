<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-xl">List Hotels</h2>
            <div class="flex gap-1">
                <form action="{{ route('admin.hotels.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Search hotels name..." 
                            class="border rounded-md px-3 py-2 text-sm w-64"
                    />
                    <button type="submit" 
                    class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 h-8 flex items-center justify-center">
                        Search
                    </button>
                </form>   
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <p>
                                    @if (request('jarak'))
                                        {{ $allDistance[request('jarak')] ?? 'Jarak' }}
                                    @else
                                        Distance
                                    @endif
                                </p>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('admin.hotels.index', array_merge(request()->query(), ['jarak' => null]))"
                            class="{{ is_null(request('jarak')) ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('All Distances') }}
                        </x-dropdown-link>
                
                        @foreach ($allDistance as $key => $distance)
                            <x-dropdown-link :href="route('admin.hotels.index', array_merge(request()->query(), ['jarak' => $key]))"
                                class="{{ request('jarak') === $key ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $distance }}
                            </x-dropdown-link>
                        @endforeach
                
                    </x-slot>
                </x-dropdown>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <p>
                                    @if (request('harga') && isset($allPrice[request('harga')]))
                                        {{ $allPrice[request('harga')] }}
                                    @else
                                        Price
                                    @endif
                                </p>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('admin.hotels.index', array_merge(request()->query(), ['harga' => null]))"
                            class="{{ is_null(request('harga')) ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('All Price') }}
                        </x-dropdown-link>
                
                        @foreach ($allPrice as $key => $price)
                            <x-dropdown-link :href="route('admin.hotels.index', array_merge(request()->query(), ['harga' => $key]))"
                                class="{{ request('harga') === $key ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $price }}
                            </x-dropdown-link>
                        @endforeach
                
                    </x-slot>
                </x-dropdown>
                
                
            </div>
            <a href="{{ route('hotels.create') }}">
                <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">Add</button>
            </a>
        </div>

        <div class="mt-4 table-responsive">
            <p class="text-gray-500 my-2">
                <strong>Current Filters:</strong>

                @if ($jarak)
                    <span class="badge bg-blue-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        {{ ucfirst($jarak) }}
                        
                        <a href="{{ route('admin.hotels.index', array_merge(request()->except('jarak'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif

                @if ($harga)
                    <span class="badge bg-green-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        {{ ucfirst($harga) }}
                        
                        <a href="{{ route('admin.hotels.index', array_merge(request()->except('harga'), ['page' => 1])) }}"
                        class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
                
                @if ($search)
                    <span class="badge bg-purple-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        Search: "{{ $search }}"
                        
                        <a href="{{ route('admin.hotels.index', array_merge(request()->except('search'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            
                
                @if (!$jarak && !$search && !$harga)
                    <span class="text-gray-500">No filters applied</span>
                @endif
            </p>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Jarak</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hotels->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center text-gray-500 py-4">
                                No hotels found matching the selected filters.
                            </td>
                        </tr>
                    @else
                        @foreach ($hotels as $hotel)
                            <tr>
                                <th scope="row">{{ $hotel->id }}</th>
                                <td>{{ $hotel->jarak }}</td>
                                <td>{{ $hotel->nama }}</td>
                                <td>{{ $hotel->alamat }}</td>
                                <td>{{ $hotel->harga }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $hotel->foto) }}" alt="Foto" class="w-20 h-20 object-cover">
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <button
                                            class="bg-gray-400 p-1 rounded-md w-20 font-semibold"
                                            x-data=""
                                            x-on:click.prevent="
                                                $dispatch('open-modal', 'view-hotel'); 
                                                $dispatch('set-hotel', {
                                                    foto: '{{ url('storage/' . $hotel->foto) }}',
                                                    jarak: '{{ $hotel->jarak }} Km from airport',
                                                    nama: '{{ $hotel->nama }}',
                                                    alamat: '{{ $hotel->alamat }}',
                                                    harga: 'Start from Rp. {{ number_format($hotel->harga) }}',
                                                });"
                                        >
                                            View
                                        </button>
                                        <a href="{{ route('hotels.edit', $hotel) }}">
                                            <button class="bg-yellow-400 p-1 rounded-md w-20 font-semibold">Edit</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <x-modal name="view-hotel" focusable>
            <div x-data="{ hotel: {} }" x-on:set-hotel.window="hotel = $event.detail">
                <div class="p-6 items-center">
                    <div class="hotel-item">
                        <img :src="hotel.foto" alt="foto" class="hotel-image">
                        <div class="hotel-info">
                            <div class="hotel-distance">
                                <i class="fas fa-location-dot"></i>
                                <span x-text="hotel.jarak"></span>
                            </div>
                            <h3 class="hotel-name" x-text="hotel.nama"></h3>
                            <p class="hotel-address">
                                <i class="fas fa-map-marker-alt"></i>
                                <span x-text="hotel.alamat"></span>
                            </p>
                            <p class="hotel-price" x-text="hotel.harga"></p>
                        </div>
                    </div>
                    <div class="mt-6 justify-end">
                        <x-secondary-button x-on:click="$dispatch('close-modal', 'view-hotel')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </x-modal>

        <div class="mt-4">
            {{ $hotels->links() }}
        </div>

    </div>
</x-app-layout>
