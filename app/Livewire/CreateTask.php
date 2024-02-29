<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTask extends Component
{
    public $task = '';

    public function rules()
    {
        return [
            'task' => 'required',
        ];
    }

    public function save()
    {
        $this->validate();

        Auth::user()->tasks()->create(
            $this->only(['task'])
        );

        $this->emit('refreshTasks');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-task');
    }
}
