<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6 justify-between items-center">
            <h2 class="font-semibold text-xl">Edit Tenant</h2>
            @include('admin.tenants.partials.delete-tenant', ['tenant' => $tenant])
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $tenant->foto }}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('tenants.update', $tenant) }}" class="flex gap-8">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md" />
                </div>
                <div class="w-1/2">
                    <!-- Foto -->
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" 
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <!-- Status -->
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="block mt-1 w-full border p-2" required>
                            <option value="" disabled {{ !$tenant->status ? 'selected' : '' }}>Status</option>
                            <option value="Active" {{ $tenant->status === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $tenant->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <!-- Kategori -->
                    <div class="mt-4">
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <select id="kategori" name="kategori" class="block mt-1 w-full border p-2" required>
                            <option value="" disabled {{ !$tenant->kategori ? 'selected' : '' }}>Pilih kategori</option>
                            <option value="Food & Beverage" {{ $tenant->kategori === 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                            <option value="Retail" {{ $tenant->kategori === 'Retail' ? 'selected' : '' }}>Retail</option>
                            <option value="Services" {{ $tenant->kategori === 'Services' ? 'selected' : '' }}>Services</option>
                            <option value="Duty Free" {{ $tenant->kategori === 'Duty Free' ? 'selected' : '' }}>Duty Free</option>
                        </select>
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <!-- Nama -->
                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            value="{{ $tenant->nama }}" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <!-- Location -->
                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <select id="location" name="location" class="block mt-1 w-full border p-2" required>
                            <option value="" disabled {{ old('location') ? '' : 'selected' }}>Pilih lokasi</option>
                            <option value="Terminal 1" {{ $tenant->location == 'Terminal 1' ? 'selected' : '' }}>Terminal 1</option>
                            <option value="Terminal 2" {{ $tenant->location == 'Terminal 2' ? 'selected' : '' }}>Terminal 2</option>
                            <option value="Domestic Area" {{ $tenant->location == 'Domestic Area' ? 'selected' : '' }}>Domestic Area</option>
                            <option value="International Area" {{ $tenant->location == 'International Area' ? 'selected' : '' }}>International Area</option>
                        </select>
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <!-- Deskipsi -->
                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi Id')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full" type="text"
                            name="deskripsi">{{ $tenant->deskripsi }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi_en" :value="__('Deskripsi En')" />
                        <x-text-area id="deskripsi_en" class="block mt-1 w-full" type="text"
                            name="deskripsi_en">{{ $tenant->deskripsi_en }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi_en')" class="mt-2" />
                    </div>

                    <!-- Jadwal -->
                    <div class="mt-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="jam_buka" :value="__('Jam Buka')" />
                                <input 
                                    type="time" 
                                    id="jam_buka" 
                                    name="jam_buka" 
                                    class="form-input mt-1 block w-full"
                                    value="{{ $tenant->jam_buka }}"
                                />
                                @error('jam_buka')
                                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div>
                                <x-input-label for="jam_tutup" :value="__('Jam Tutup')"/>
                                <input 
                                    type="time" 
                                    id="jam_tutup" 
                                    name="jam_tutup" 
                                    class="form-input mt-1 block w-full"
                                    value="{{ $tenant->jam_tutup }}"
                                />
                                @error('jam_tutup')
                                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>
