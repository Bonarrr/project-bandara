<x-app-layout title="Destinations">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-xl">List destinations</h2>
            <div class="flex gap-1">
                <form action="{{ route('admin.destinations.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Search destinations name..." 
                            class="border rounded-md px-3 py-2 text-sm w-64"
                    />
                    <button type="submit" 
                    class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 h-8 flex items-center justify-center">
                        Search
                    </button>
                </form>
            </div>
            <a href="{{ route('destinations.create') }}">
                <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">Add</button>
            </a>
        </div>

        <div class="mt-4 table-responsive">
            <p class="text-gray-500 my-2">
                <strong>Current Filters:</strong>           
                
                @if ($search)
                    <span class="badge bg-purple-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        Search: "{{ $search }}"
                        
                        <a href="{{ route('admin.destinations.index', array_merge(request()->except('search'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            
                
                @if (!$search)
                    <span class="text-gray-500">No filters applied</span>
                @endif
            </p>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi Id</th>
                        <th scope="col">Deskripsi En</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($destinations->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center text-gray-500 py-4">
                                No destinations found matching the selected filters.
                            </td>
                        </tr>
                    @else
                        @foreach ($destinations as $destination)
                            <tr>
                                <th scope="row">{{ $destination->id }}</th>
                                <td>{{ $destination->nama }}</td>
                                <td>{{ $destination->deskripsi }}</td>
                                <td>{{ $destination->deskripsi_en }}</td>
                                <td>{{ implode(', ', $destination->tipe) }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $destination->foto) }}" alt="Foto" class="w-20 h-20 object-cover">
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <button
                                            class="bg-gray-400 p-1 rounded-md w-20 font-semibold"
                                            x-data=""
                                            x-on:click.prevent="
                                                $dispatch('open-modal', 'view-destination'); 
                                                $dispatch('set-destination', {
                                                    foto: '{{ url('storage/' . $destination->foto) }}',
                                                    deskripsi: '{{ $destination->deskripsi }}',
                                                    nama: '{{ $destination->nama }}',
                                                    tipe: '{{ implode(', ', $destination->tipe) }}',
                                                });"
                                        >
                                            View
                                        </button>
                                        <a href="{{ route('destinations.edit', $destination) }}">
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

        {{-- <x-modal name="view-destination" focusable>
            <div x-data="{ destination: {} }" x-on:set-destination.window="destination = $event.detail">
                <div class="p-6 items-center">
                    <div class="tenant-item">
                        <img :src="destination.foto" alt="foto" class="tenant-image">
                        <div class="tenant-info">
                            <p class="tenant-category"><i class="fas fa-map-marker-alt"></i> <span x-text="destination.location"></span></p>
                            <h3 class="tenant-name" x-text="destination.nama"></h3>
                            <p class="tenant-description" x-text="destination.deskripsi"></p>                            
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 ml-6 justify-end">
                        <x-secondary-button x-on:click="$dispatch('close-modal', 'view-destination')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </x-modal> --}}

        <div class="mt-4">
            {{ $destinations->links() }}
        </div>

    </div>
</x-app-layout>
