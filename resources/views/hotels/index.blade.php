<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if (session()->has('success'))
            <x-alert message="{{ session('success') }}" />
        @endif

        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-xl">List hotels</h2>
            <a href="{{ route('hotels.create') }}">
                <button class="bg-gray-100 px-10 py-2 rounded-md font-semibold">Add</button>
            </a>

        </div>

        <div class="grid md:grid-cols-3 grid-cols-1 mt-4 gap-6">
            @foreach ($hotels as $hotel)
                <div>
                    <img src="{{ url('storage/' . $hotel->foto) }}" class="h-96 w-full object-cover" />
                    <div class="my-2">
                        <p class="text-xl font-light">{{ $hotel->tipe }}</p>
                        <p class="text-xl font-light">{{ $hotel->nama }}</p>
                        <p class="font-semibold text-gray-400">Rp. {{ number_format($hotel->harga) }}</p>
                        <p class="text-xl font-light">{{ $hotel->location }}</p>
                    </div>
                    <a href="{{ route('hotels.edit', $hotel) }}">
                        <button class="bg-gray-100 px-10 py-2 w-full rounded-md font-semibold">Edit</button>
                    </a>
                </div>
            @endforeach
        </div>


        <div class="mt-4">
            {{ $hotels->links() }}
        </div>

    </div>
</x-app-layout>