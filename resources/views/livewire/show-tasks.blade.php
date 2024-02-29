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
                                <button
                                    wire:click="complete({{ $task->id }})"
                                    class="btn btn-success {{ $task->completed_at !== null ? 'invisible' : '' }}"
                                    type="button"
                                    title="Mark Completed"
                                    aria-label="Mark Completed"
                                >
                                    <span class="glyphicon glyphicon-ok"></span>
                                </button>
                                <button
                                    wire:click="delete({{ $task->id }})"
                                    class="btn btn-danger {{ $task->completed_at !== null ? 'invisible' : '' }}"
                                    type="button"
                                    title="Delete"
                                    aria-label="Delete"
                                >
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
