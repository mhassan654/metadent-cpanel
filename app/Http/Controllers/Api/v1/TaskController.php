<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }

    public function index()
    {
        return $this->allTasks();
    }

    public function store()
    {
        request()->validate(["task" => "required"]);

        $task = Task::create([
            "title" => request()->title,
            "task" => request()->task,
            "due_date" => request()->dueDate,
            "user_id" => Auth::user()->id,
            "facility_id" => Auth::user()->facility_id,
        ]);

        if($task)
        {
            return $this->allTasks();
        }

        return $this->customFailResponseWithPayload("Task does not exist");
    }

    public function update()
    {
        request()->validate(["taskId" => "required"]);

        $task = Task::find(request()->taskId);

        if($task)
        {
            $task->update([
                "title" => request()->title,
                "task" => request()->task,
                "due_date" => request()->dueDate,
            ]);

            return $this->allTasks();
        }

        return $this->customFailResponseWithPayload("Task does not exist");
    }

    public function destroy()
    {
        request()->validate(["taskId" => "required"]);

        $task = Task::find(1);
        // $tasks = Task::all();
        // dd($tasks);

        if($task)
        {
            $task->delete();

            return $this->allTasks();
        }

        return $this->customFailResponseWithPayload("Task does not exist");
    }

    private function allTasks()
    {
        return $this->customSuccessResponseWithPayload(Task::where("facility_id", Auth::user()->facility_id)
        ->where("user_id", Auth::user()->id)->orderBy("due_date", "desc")->get());
    }

    private function allEmployeeBasedTasks()
    {
        return $this->customSuccessResponseWithPayload(Task::where("facility_id", Auth::user()->facility_id)
        ->where("employee_id", Auth::user()->id)->orderBy("due_date", "desc")->get());
    }
}
