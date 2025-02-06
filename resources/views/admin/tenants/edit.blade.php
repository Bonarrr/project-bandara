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
                            <option value="Teknologi" {{ $tenant->kategori === 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Bisnis" {{ $tenant->kategori === 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                            <option value="Pendidikan" {{ $tenant->kategori === 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        </select>
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    </div>

                    <!-- Tipe -->
                    <div class="mt-4">
                        <x-input-label for="tipe" :value="__('Tipe')" />
                        <select id="tipe" name="tipe" class="block mt-1 w-full border p-2">
                            <option value="" disabled {{ !$tenant->tipe ? 'selected' : '' }}>Pilih tipe</option>
                            <option value="Fast Food" {{ $tenant->tipe === 'Fast Food' ? 'selected' : '' }}>Fast Food</option>
                        </select>
                        <x-input-error :messages="$errors->get('tipe')" class="mt-2" />
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
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                            value="{{ $tenant->location }}" required />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <!-- Jadwal -->
                    <div class="mt-4">
                        <x-schedule-checkbox 
                        name="jadwal" 
                        label="Pilih Jadwal" 
                        :days="[ 
                            'monday' => 'Senin', 
                            'tuesday' => 'Selasa', 
                            'wednesday' => 'Rabu', 
                            'thursday' => 'Kamis', 
                            'friday' => 'Jumat', 
                            'saturday' => 'Sabtu', 
                            'sunday' => 'Minggu' 
                        ]" 
                        :checked="old('jadwal', $tenant->jadwal ?? [])"
                    />                    
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
