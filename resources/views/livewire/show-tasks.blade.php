<x-panel>
    <table class="min-w-full text-left text-md">
        <thead>
            <tr class="border-b-2">
                <th class="py-3 w-16">#</th>
                <th class="py-3">Task</th>
                <th class="py-3 w-24"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr class="border-b last-of-type:border-none">
                    <td class="py-3">{{ $task->id }}</td>
                    <td class="py-3">
                        @if ($task->completed_at === null)
                            {{ $task->task }}
                        @else
                            <s>{{ $task->task }}</s>
                        @endif
                    </td>
                    <td class="py-3">
                        <button
                            wire:click="complete({{ $task->id }})"
                            class="inline-flex items-center px-2 py-1 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 transition ease-in-out duration-150 {{ $task->completed_at !== null ? 'invisible' : '' }}"
                            type="button"
                            title="Mark Completed"
                            aria-label="Mark Completed"
                        >
                            <x-icons.tick />
                        </button>
                        <button
                            wire:click="delete({{ $task->id }})"
                            class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 transition ease-in-out duration-150 {{ $task->completed_at !== null ? 'invisible' : '' }}"
                            type="button"
                            title="Delete"
                            aria-label="Delete"
                        >
                            <x-icons.cross />
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-panel>
