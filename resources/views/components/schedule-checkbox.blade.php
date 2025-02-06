<div>
    <x-input-label for="{{ $name }}" :value="$label ?? ucfirst($name)" />
    
    <div class="grid grid-cols-2 gap-4 mt-2">
        <!-- Pilihan Hari -->
        <div class="flex flex-col">
            @foreach ($days as $key => $day)
                <div>
                    <input 
                        type="checkbox" 
                        name="{{ $name }}[]" 
                        value="{{ $key }}" 
                        id="{{ $name }}_{{ $key }}" 
                        {{ in_array($key, old($name, [])) ? 'checked' : '' }}
                    />
                    <label for="{{ $name }}_{{ $key }}" class="ml-2">{{ $day }}</label>
                </div>
            @endforeach
        </div>

        <!-- Jam Buka dan Jam Tutup -->
        <div class="flex flex-col">
            <div class="mt-4">
                <x-input-label for="jam_buka" :value="__('Jam Buka')" />
                <input 
                    type="time" 
                    id="jam_buka" 
                    name="jam_buka" 
                    class="form-input mt-1 block w-full"
                    value="{{ old('jam_buka') }}"
                />
                @error('jam_buka')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mt-4">
                <x-input-label for="jam_tutup" :value="__('Jam Tutup')"/>
                <input 
                    type="time" 
                    id="jam_tutup" 
                    name="jam_tutup" 
                    class="form-input mt-1 block w-full"
                    value="{{ old('jam_tutup') }}"
                />
                @error('jam_tutup')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    @error($name)
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
</div>