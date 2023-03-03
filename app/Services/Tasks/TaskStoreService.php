<?php
/**
 **Created by MUWONGE HASSAN on 10/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: #
 */

namespace App\Services\Tasks;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessTaskCreationNotificationsJob;
use App\Models\Task;
use App\Notifications\TaskCreatedNotification;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskStoreService
{
    use ApiResponser;

    public static function store()
    {
        $validator = Validator::make(request()->all(), [
            "title" => "required|string",
            "task" => "required|string",
            "dueDate" => "required|date|date_format:d-m-Y",
            "employeeId" => "nullable|integer|exists:App\Models\Employee,id",
            "statusId" => "required|integer|exists:App\Models\Status,id",
            "read" => "nullable|boolean"
        ]);

        $controller = new Controller();

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $controller->customFailResponseMessage($validator->messages(), 404);
        }
        try {
            $task = new Task;
            $task->title = request()->title;
            $task->task = request()->task;
            $task->due_date = request()->dueDate;
            $task->employee_id = request()->employeeId;
            $task->status_id = request()->statusId;
            $task->facility_id = Auth::user()->facility_id;
            $task->created_by = Auth::user()->id;
            $task->read = request()->read;
            $task->save();

            if ($task) {

                $task_to_return = Task::with('status:id,title')->find($task->id);

                $employee = !is_null($task->employee_id) ? \Metadent\AuthModule\Models\Employee::where('id', $task->employee_id)->first(['id', 'first_name', 'last_name'])
                    ->makeHidden(['roles', 'permissions']) : null;

                $created_by = !is_null($task->created_by) ? \Metadent\AuthModule\Models\Employee::where('id', $task->created_by)->first(['id', 'first_name', 'last_name'])
                    ->makeHidden(['roles', 'permissions']) : null;

                $task_to_return->employee = $employee;

                $task_to_return->created_by = $created_by;



                ProcessTaskCreationNotificationsJob::dispatch($task_to_return);
                return $controller->customSuccessResponseWithPayload($task_to_return);

            }
            return $controller->customFailResponseWithPayload("Task creation failed");

        } catch (\Throwable $th) {
            throw $th;

            return $th->getMessage();

        }

    }

}
