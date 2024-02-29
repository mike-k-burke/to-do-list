<div>
    <form wire:submit.prevent="save">
        <div class="form-group {{ $errors->get('task') ? 'has-error' : '' }}">
            <x-text-input class="w-full" wire:model="task" id="task" type="text" name="task" placeholder="Insert task name" required autofocus />
            <x-input-error :messages="$errors->get('task')" class="mt-4" />
        </div>

        <div>
            <x-primary-button class="w-full mt-4">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</div>
