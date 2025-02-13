<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-xl">List artworks</h2>
            <div class="flex gap-1">
                <form action="{{ route('admin.artworks.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Search artworks name..." 
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
                            <div><p>Location</p></div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('admin.artworks.index', array_merge(request()->query(), ['location' => null]))"
                            class="{{ is_null(request('location')) ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('All Location') }}
                        </x-dropdown-link>

                        @foreach ($allLocation as $lokasi)
                            <x-dropdown-link :href="route('admin.artworks.index', array_merge(request()->query(), ['location' => $lokasi]))"
                                class="{{ request('location') === $lokasi ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $lokasi }}
                            </x-dropdown-link>
                        @endforeach

                    </x-slot>
                </x-dropdown>
            </div>
            <a href="{{ route('artworks.create') }}">
                <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">Add</button>
            </a>
        </div>

        <div class="mt-4 table-responsive">
            <p class="text-gray-500 my-2">
                <strong>Current Filters:</strong>

                @if ($location)
                    <span class="badge bg-blue-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        {{ ucfirst($location) }}
                        
                        <a href="{{ route('admin.artworks.index', array_merge(request()->except('location'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            
                
                @if ($search)
                    <span class="badge bg-purple-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        Search: "{{ $search }}"
                        
                        <a href="{{ route('admin.artworks.index', array_merge(request()->except('search'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            
                
                @if (!$location && !$search)
                    <span class="text-gray-500">No filters applied</span>
                @endif
            </p>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Deskripsi Id</th>
                        <th scope="col">Deskripsi En</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($artworks->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center text-gray-500 py-4">
                                No artworks found matching the selected filters.
                            </td>
                        </tr>
                    @else
                        @foreach ($artworks as $artwork)
                            <tr>
                                <th scope="row">{{ $artwork->id }}</th>
                                <td>{{ $artwork->nama }}</td>
                                <td>{{ $artwork->location }}</td>
                                <td>{{ $artwork->deskripsi }}</td>
                                <td>{{ $artwork->deskripsi_en }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $artwork->foto) }}" alt="Foto" class="w-20 h-20 object-cover">
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <button
                                            class="bg-gray-400 p-1 rounded-md w-20 font-semibold"
                                            x-data=""
                                            x-on:click.prevent="
                                                $dispatch('open-modal', 'view-artwork'); 
                                                $dispatch('set-artwork', {
                                                    foto: '{{ url('storage/' . $artwork->foto) }}',
                                                    deskripsi: '{{ $artwork->deskripsi }}',
                                                    nama: '{{ $artwork->nama }}',
                                                    location: '{{ $artwork->location }}',
                                                });"
                                        >
                                            View
                                        </button>
                                        <a href="{{ route('artworks.edit', $artwork) }}">
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

        <x-modal name="view-artwork" focusable>
            <div x-data="{ artwork: {} }" x-on:set-artwork.window="artwork = $event.detail">
                <div class="p-6 items-center">
                    <div class="tenant-item">
                        <img :src="artwork.foto" alt="foto" class="tenant-image">
                        <div class="tenant-info">
                            <p class="tenant-category"><i class="fas fa-map-marker-alt"></i> <span x-text="artwork.location"></span></p>
                            <h3 class="tenant-name" x-text="artwork.nama"></h3>
                            <p class="tenant-description" x-text="artwork.deskripsi"></p>                            
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 ml-6 justify-end">
                        <x-secondary-button x-on:click="$dispatch('close-modal', 'view-artwork')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </x-modal>

        <div class="mt-4">
            {{ $artworks->links() }}
        </div>

    </div>
</x-app-layout>
