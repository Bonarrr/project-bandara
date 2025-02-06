<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-xl">List Tenants</h2>
            <div class="flex gap-1">
                <form action="{{ route('tenants.index') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Search tenants name..." 
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
                            <div><p>Kategori</p></div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('tenants.index', array_merge(request()->query(), ['kategori' => null]))"
                            class="{{ is_null(request('kategori')) ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('All Categories') }}
                        </x-dropdown-link>

                        @foreach ($allCategories as $category)
                            <x-dropdown-link :href="route('tenants.index', array_merge(request()->query(), ['kategori' => $category]))"
                                class="{{ request('kategori') === $category ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $category }}
                            </x-dropdown-link>
                        @endforeach

                    </x-slot>
                </x-dropdown>
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div><p>Status</p></div>
    
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('tenants.index', array_merge(request()->query(), ['status' => null]))"
                            class="{{ is_null(request('status')) ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('All Status') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('tenants.index', array_merge(request()->query(), ['status' => 'active']))"
                            class="{{ request('status') === 'active' ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('Active') }}
                        </x-dropdown-link>
                        
                        <x-dropdown-link :href="route('tenants.index', array_merge(request()->query(), ['status' => 'inactive']))"
                            class="{{ request('status') === 'inactive' ? 'bg-gray-200 font-bold' : '' }}">
                            {{ __('Inactive') }}
                        </x-dropdown-link>
                                          
                    </x-slot>
                </x-dropdown>
            </div>
            <a href="{{ route('tenants.create') }}">
                <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">Add</button>
            </a>
        </div>

        <div class="mt-4 table-responsive">
            <p class="text-gray-500 my-2">
                <strong>Current Filters:</strong>

                @if ($status)
                    <span class="badge {{ $status === 'active' ? 'bg-green-500' : 'bg-red-500' }} text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        {{ ucfirst($status) }}

                        <a href="{{ route('tenants.index', array_merge(request()->except('status'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            

                @if ($kategori)
                    <span class="badge bg-blue-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        {{ ucfirst($kategori) }}
                        
                        <a href="{{ route('tenants.index', array_merge(request()->except('kategori'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            
                
                @if ($search)
                    <span class="badge bg-purple-500 text-white inline-flex items-center gap-2 px-2 py-1 rounded">
                        Search: "{{ $search }}"
                        
                        <a href="{{ route('tenants.index', array_merge(request()->except('search'), ['page' => 1])) }}"
                           class="text-white hover:text-gray-300 ml-1">
                            &times;
                        </a>
                    </span>
                @endif
            
                
                @if (!$status && !$kategori && !$search)
                    <span class="text-gray-500">No filters applied</span>
                @endif
            </p>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Jam Buka</th>
                        <th scope="col">Jam Tutup</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($tenants->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center text-gray-500 py-4">
                                No tenants found matching the selected filters.
                            </td>
                        </tr>
                    @else
                        @foreach ($tenants as $tenant)
                            <tr>
                                <th scope="row">{{ $tenant->id }}</th>
                                <td>{{ $tenant->status }}</td>
                                <td>{{ $tenant->kategori }}</td>
                                <td>{{ $tenant->tipe }}</td>
                                <td>{{ $tenant->nama }}</td>
                                <td>{{ $tenant->location }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $tenant->foto) }}" alt="Foto" class="w-20 h-20 object-cover">
                                </td>
                                <td>{{ implode(', ', $tenant->jadwal) }}</td>
                                <td>{{ date('H:i', strtotime($tenant->jam_buka)) }}</td>
                                <td>{{ date('H:i', strtotime($tenant->jam_tutup)) }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button
                                            class="bg-gray-400 p-1 rounded-md w-20 font-semibold"
                                            x-data=""
                                            x-on:click.prevent="
                                                $dispatch('open-modal', 'view-tenant'); 
                                                $dispatch('set-tenant', {
                                                    foto: '{{ url('storage/' . $tenant->foto) }}',
                                                    tipe: '{{ $tenant->tipe }}',
                                                    nama: '{{ $tenant->nama }}',
                                                    location: '{{ $tenant->location }}',
                                                    jadwal: '{{ implode(', ', $tenant->jadwal) }}',
                                                    jam_buka: '{{ date('H:i', strtotime($tenant->jam_buka)) }}',
                                                    jam_tutup: '{{ date('H:i', strtotime($tenant->jam_tutup)) }}'
                                                });
                                            "
                                        >
                                            View
                                        </button>
                                        <a href="{{ route('tenants.edit', $tenant) }}">
                                            <button class="bg-blue-400 p-1 rounded-md w-20 font-semibold">Edit</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <x-modal name="view-tenant" focusable>
            <div x-data="{ tenant: {} }" x-on:set-tenant.window="tenant = $event.detail">
                <div class="p-6 items-center">
                    <div class="card" style="width: 18rem;" x-show="Object.keys(tenant).length > 0">
                        <img :src="tenant.foto" class="card-img-top" alt="Foto Tenant" x-show="tenant.foto">
                        <div class="card-body">
                            <p x-text="tenant.tipe"></p>
                            <h3 class="font-bold text-xl" x-text="tenant.nama"></h3>
                            <p x-text="tenant.location"></p>
                            <p x-text="tenant.jadwal"></p>
                            <p x-text="tenant.jam_buka + ' - ' + tenant.jam_tutup"></p>
                        </div>
                    </div>
                    <div class="mt-6 justify-end">
                        <x-secondary-button x-on:click="$dispatch('close-modal', 'view-tenant')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </x-modal>

        <div class="mt-4">
            {{ $tenants->links() }}
        </div>

    </div>
</x-app-layout>
