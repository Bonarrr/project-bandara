<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6 justify-between items-center">
            <h2 class="font-semibold text-xl">Edit hotel</h2>
            @include('hotels.partials.delete-hotel', ['hotel' => $hotel])
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $hotel->foto }}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('hotels.update', $hotel) }}"
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
                            type="file" name="foto" :value="$hotel->foto"
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tipe" :value="__('Tipe')" />
                        <select id="tipe" name="tipe" class="block mt-1 w-full border p-2" required>
                            <option value="" disabled {{ old('tipe') ? '' : 'selected' }}>Pilih tipe</option>
                            <option value="Fast Food" {{ old('tipe') == 'Fast Food' ? 'selected' : '' }}>Fast Food</option>
                        </select>
                        <x-input-error :messages="$errors->get('tipe')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            :value="$hotel->nama" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                            :value="$hotel->harga" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                            :value="$hotel->location" required />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

    </div>
</x-app-layout>