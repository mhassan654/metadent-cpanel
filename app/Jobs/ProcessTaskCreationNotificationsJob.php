<?php

namespace App\Jobs;

use App\Models\Task;
use App\Models\User;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskCreatedNotification;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessTaskCreationNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $task;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
       
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $employee = $this->task->employee;     
        if($employee) $employee->notify(new TaskCreatedNotification($this->task));        
        else {
                $department = Department::where('department',['Front Office'])
                    ->where('facility_id',$this->task->facility_id)
                    ->first();
                if ($department){
                   $employees = $department->employees;
                   Notification::send($employees, new TaskCreatedNotification($this->task));

                }
        }

    }
}
