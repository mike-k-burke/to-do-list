<x-app-layout>
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div>
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="form-group {{ $errors->get('task') ? 'has-error' : '' }}">
                        <input class="form-control" wire:model="task" id="task" type="text" name="task" placeholder="Insert task name" required autofocus />
                        @if ($errors->get('task'))
                            <ul class="text-danger list-unstyled">
                                @foreach ((array) $errors->get('task') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if (session('create-error'))
                            <span class="text-danger">{{ session('create-error') }}</span>
                        @endif
                    </div>

                    <div>
                        <button class="btn btn-primary btn-block" type="submit">{{ __('Add') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="col-xs-1">{{ $task->id }}</td>
                                    <td class="col-xs-10">
                                        @if ($task->completed_at === null)
                                            {{ $task->task }}
                                        @else
                                            <s>{{ $task->task }}</s>
                                        @endif
                                    </td>
                                    <td class="col-xs-1">
                                        <div class="actions">
                                            <form method="POST" action="{{ route('tasks.complete', [$task]) }}">
                                                @csrf
                                                <button
                                                    class="btn btn-success {{ $task->completed_at !== null ? 'invisible' : '' }}"
                                                    type="submit"
                                                    title="Mark Completed"
                                                    aria-label="Mark Completed"
                                                >
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('tasks.destroy', [$task]) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button
                                                    class="btn btn-danger {{ $task->completed_at !== null ? 'invisible' : '' }}"
                                                    type="submit"
                                                    title="Delete"
                                                    aria-label="Delete"
                                                >
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
