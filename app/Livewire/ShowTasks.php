<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowTasks extends Component
{
    public $listeners = ['refreshTasks' => '$refresh'];

    public function render()
    {
        return view('livewire.show-tasks', [
            'tasks' => Auth::user()->tasks,
        ]);
    }

    public function delete(Task $task)
    {
        $task->delete();
    }

    public function complete(Task $task)
    {
        $task->update(['completed_at' => Carbon::now()]);
    }
}
