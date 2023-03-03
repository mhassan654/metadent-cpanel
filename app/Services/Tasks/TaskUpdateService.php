<?php
/**
 **Created by MUWONGE HASSAN on 10/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;

class TaskUpdateService
{
    use ApiResponser;

    public static function update()
    {
        $controller = new Controller();

        $validator = Validator::make(request()->all(), [
            "taskId" => "required|integer",
            "title" => "required|string",
            "task" => "required|string",
            "dueDate" => "required|date|date_format:d-m-Y",
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "statusId" => "required|integer|exists:App\Models\Status,id",
            "read" => "nullable|boolean"
        ]);


        if ($validator->fails()) {

            $errors = $validator->errors();

            return $validator->messages();

        }

        $task = Task::find(request()->taskId);

        if ($task) {
            $task->update([
                "title" => request()->title,
                "task" => request()->task,
                "employee_id" => request()->employeeId,
                "status_id" => request()->statusId,
                "due_date" => request()->dueDate,
                "read" => request()->read
            ]);

            $task_to_return = Task::with('status:id,title')->find($task->id);

            $employee = \Metadent\AuthModule\Models\Employee::where('id', $task->employee_id)->first(['id', 'first_name', 'last_name'])
                ->makeHidden(['roles', 'permissions']);
            $created_by = !is_null($task->created_by) ? \Metadent\AuthModule\Models\Employee::where('id', $task->created_by)->first(['id', 'first_name', 'last_name'])
                ->makeHidden(['roles', 'permissions']) : null;

            $task_to_return->created_by = $created_by;

            $task_to_return->employee = $employee;

            return $task_to_return;
        }

        return $controller->customFailResponseWithPayload("Task does not exist");
    }

}
