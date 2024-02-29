<div>
    <form wire:submit.prevent="save">
        <div class="form-group {{ $errors->get('task') ? 'has-error' : '' }}">
            <input class="form-control" wire:model="task" id="task" type="text" name="task" placeholder="Insert task name" required autofocus />
            @if ($errors->get('task'))
                <ul class="text-danger list-unstyled">
                    @foreach ((array) $errors->get('task') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            <button class="btn btn-primary btn-block" type="submit">{{ __('Add') }}</button>
        </div>
    </form>
</div>
