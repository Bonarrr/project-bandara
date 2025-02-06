<!-- resources/views/components/confirm-delete-modal.blade.php -->
@props(['name', 'action', 'title' => 'Are you sure?', 'description' => 'Once deleted, this action cannot be undone.', 'confirmText' => 'Delete'])

<x-modal :name="$name" focusable>
    <form method="post" :action="$action" class="p-6">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            {{ $title }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ $confirmText }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
