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

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class TaskListService
{
    public static function get_doctors_tasks()
    {
//        if (auth()->user()->role('Doctor')) {
            $doctor_tasks = [];
            $tasks = Task::with('status:id,title')->whereHas('doctor', function ($query) {
                $query->role('Doctor');
            })->where('employee_id', auth()->user()->id)
                ->where('status_id', '!=', 3)
                ->orderBy('created_at', 'DESC')
                ->get();
            foreach ($tasks as $task) {
                $date = strtotime(\Carbon\Carbon::now()->format('d-m-Y'));
                $task_due_date = strtotime($task->due_date);
                if ($task_due_date < $date) {
                    $task->update([
                        'status_id' => 4
                    ]);
                }
                $task->status = \App\Models\Status::where('id', $task->status_id)->first(['id', 'title']);
                $task->created_by = !is_null($task->created_by) ? Employee::where('id', $task->created_by)->first(['id', 'first_name', 'last_name'])
                    ->makeHidden(['roles', 'permissions']) : null;
                unset($task->status_id);
                unset($task->employee_id);
                $doctor_tasks[] = $task;
            }
            return $doctor_tasks;
//        }
//        throw new \Exception('Only Doctors are allowed to view Doctor tasks');
    }

    public static function allTasks()
    {
        try {
            $final_tasks = [];
            $all_tasks = Task::where('status_id', '!=', 3)
                ->orderBy('created_at', 'DESC')
                ->get();
            foreach ($all_tasks as $task) {
                $date = strtotime(\Carbon\Carbon::now()->format('d-m-Y'));
                $task_due_date = strtotime($task->due_date);
                if ($task_due_date < $date) {
                    $task->update([
                        'status_id' => 4
                    ]);
                }

                $task->status = \App\Models\Status::where('id', $task->status_id)->first(['id', 'title']);
                $task->employee = !is_null($task->employee_id) ? Employee::where('id', $task->employee_id)->first(['id', 'first_name', 'last_name'])
                    ->makeHidden(['roles', 'permissions']) : null;
                $task->created_by = !is_null($task->created_by) ? Employee::where('id', $task->created_by)->first(['id', 'first_name', 'last_name'])
                    ->makeHidden(['roles', 'permissions']) : null;
                unset($task->status_id);
                unset($task->employee_id);
                $final_tasks[] = $task;
            }
            return $final_tasks;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function frontOfficeTasks()
    {
        try {
            $user = Auth::user();
        if($user)
            if($user->hasAnyRole(['Front-Office', 'Super-Admin','Receiptionist'])){
                $unassigned_tasks = Task::doesntHave('employee')->with('status')->latest()->get();
                $my_tasks = $user->tasks()->with(['status','employee'])
                    ->where('status_id','!=',3)
                    ->latest()->get();
                // dd($my_tasks);

                $overdue_tasks = Task::with(['status','employee'])
                                ->where('status_id',4)
                                ->latest()->get();
                $completed_tasks = Task::with(['status','employee'])
                                ->where('status_id',3)
                                ->latest()->get();

                    $overdue_tasks = Task::with(['status', 'employee'])
                        ->where('status_id', 4)
                        ->latest()->get();
                    $completed_tasks = Task::with(['status', 'employee'])
                        ->where('status_id', 3)
                        ->latest()->get();

                    $tasks = [
                        'unassigned_tasks' => $unassigned_tasks,
                        'my_tasks' => $my_tasks,
                        'overdue_tasks' => $overdue_tasks,
                        'completed_tasks' => $completed_tasks
                    ];
                    // dd($tasks);
                    return $tasks;
                }
            throw new UnauthorizedException('you are not allowed to access this resource');
        } catch (\Throwable $th) {
            return  $th->getMessage();
        }
    }
}
