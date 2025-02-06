<section class="space-y-6">
    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-destination')">{{ __('Delete destination') }}</x-danger-button>

    <x-modal name="confirm-delete-destination" focusable>
        <form method="post" action="{{ route('destinations.destroy', $destination) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete destination?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete destination') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>