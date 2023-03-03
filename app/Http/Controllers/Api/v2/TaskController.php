<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use App\Services\Tasks\TaskListService;
use App\Services\Tasks\TaskStoreService;
use App\Services\Tasks\TaskUpdateService;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }

    public function index(TaskListService $taskListService)
    {
        return $this->customSuccessResponseWithPayload($taskListService::allTasks());
    }

    public function get_doctors_tasks(TaskListService $taskListService)
    {
        return $this->customSuccessResponseWithPayload($taskListService::get_doctors_tasks());

    }

    public function store(TaskStoreService $taskStoreService)
    {
        return $taskStoreService::store();

    }

    public function update(TaskUpdateService $taskUpdateService)
    {
        return $this->customSuccessResponseWithPayload($taskUpdateService::update());

    }

    public function destroy(TaskListService $taskListService)
    {
        request()->validate(["taskId" => "required"]);
        $task = Task::find(request()->taskId);

        try {
            if ($task) {
                $task->delete();
                return $this->customSuccessResponseWithPayload($taskListService::allTasks());
            }

            return $this->customFailResponseWithPayload("Task does not exist");
        } catch (\Throwable$th) {
            return $this->customSuccessResponseWithPayload($taskListService::allTasks());
        }
    }

    public function getFrontOfficeTasks(TaskListService $taskListService){
        return $this->customSuccessResponseWithPayload($taskListService->frontOfficeTasks());
    }


}
