<x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <x-filament-support::button class="mt-6" type="submit">
            Enregistrer
        </x-filament-support::button>
    </form>
</x-filament::page>
