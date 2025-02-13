<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6 justify-between items-center">
            <h2 class="font-semibold text-xl">Edit destination</h2>
            @include('admin.destinations.partials.delete-destination', ['destination' => $destination])
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $destination->foto }}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('destinations.update', $destination) }}"
                class="flex gap-8">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded-md" />
                </div>
                <div class="w-1/2">
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" :value="$destination->foto"
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            :value="$destination->nama" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi Id')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full" type="text"
                            name="deskripsi">{{ $destination->deskripsi }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi_en" :value="__('Deskripsi En')" />
                        <x-text-area id="deskripsi_en" class="block mt-1 w-full" type="text"
                            name="deskripsi_en">{{ $destination->deskripsi_en }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi_en')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tipe" :value="__('Tipe')" />
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            @foreach(['Sejarah', 'Spiritual', 'Belanja', 'Kuliner', 'Budaya', 'Alam', 'Petualangan', 'Seni', 'Tradisional'] as $tipe)
                                <label class="flex items-center">
                                    <input type="checkbox" name="tipe[]" value="{{ $tipe }}" class="mr-2" {{ in_array($tipe, $destination->tipe) ? 'checked' : '' }}>
                                    {{ ucfirst($tipe) }}
                                </label>
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>