<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of all task records
     *
     * @return View
     */
    public function index()
    {
        $tasks = $this->repository->findBy(['user_id' => Auth::user()->id]);
        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Save a new task record
     *
     * @param StoreTaskRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request)
    {
        $record = $this->repository->store($request->validated());
        if (!$record) {
            return redirect()->back()->withInput()->with('create-error', 'Unable to create new task');
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Delete a task record
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task)
    {
        $this->repository->destroy($task->id);

        return redirect()->route('tasks.index');
    }

    /**
     * Mark a task record completed
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function markCompleted(Task $task)
    {
        $this->repository->update($task, ['completed_at' => Carbon::now()]);

        return redirect()->route('tasks.index');
    }
}
