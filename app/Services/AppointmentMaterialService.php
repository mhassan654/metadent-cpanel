<?php
namespace App\Services;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Task;
use Metadent\AuthModule\Models\Employee;
use App\Notifications\TaskCreatedNotification;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class AppointmentMaterialService
{
    public function monitorAppointments(){
        try {
            $appointments = Appointment::where('status_id',1)->latest()->get();
            foreach($appointments as $appointment){
                $material_date = $appointment->material_date;
                if(!$material_date) continue;
                $material_date = Carbon::parse($material_date);
                if(Carbon::today()->diffInHours($material_date) <= 24 && Carbon::today()->lte($material_date)){
                    $employee = $this->selectEmployee($material_date);
                    // dd($employee);
                    if($employee){
                        $task = $this->createNewTask($employee , $material_date, $appointment);
                        if($task){
                            $employee->notify(new TaskCreatedNotification($task));
                        }

                    }

                }
            }
        } catch (\Throwable $th) {
            Log::error('monitor material cron',['message'=>$th->getMessage()]);
            //throw $th;
        }
    }
#select an employee to assign the task to
    public function selectEmployee($delivery_date){
        $frontoffice = Department::find(11);
        $employees = $frontoffice->employees;
        $emp_count = count($employees);
        $available_employees = [];
        foreach($employees as $employee){
            $leaves = $employee->leaveApplications()
                    ->where('leave_applications.approve_end_date','>=',Carbon::today())
                    ->where('is_approved',1)->get();
            if(count($leaves) >0) continue;
            array_push($available_employees,$employee);
        }
        $available_employees = Arr::shuffle($available_employees);
        if(count($available_employees) > 0){
            $selectable = [];
            foreach($available_employees as $employee){
                $available = $this->checkAvailability($employee,$delivery_date);
                if($available)   array_push($selectable, $employee->id);
            }
            if(count($selectable) > 0){
                $least  = null;
                $employee= null;
                $emp_task_count = Employee::whereIn('id',$selectable)->withCount('tasks')->get();
                foreach($emp_task_count as $emp_task){
                    if($least === null) {
                        $least = $emp_task->tasks_count;
                        $employee = $emp_task;
                    }
                    if($emp_task->tasks_count < $least) {
                        $least = $emp_task->tasks_count;
                        $employee = $emp_task;
                    }
                }
               return $employee;
            }
            return false;
        }
    }

    #check if employee works on the day of material delivery
    public function checkAvailability(Employee $employee,Carbon $material_date){
        $day = $material_date->dayOfWeek;
        $week = $material_date->weekOfMonth;
        $weeks = $employee->weeks;
        $days = $employee->week_days;
        if(!$days || !$weeks) return false;
        if(in_array($day,$days) && in_array($week,$weeks)){
            return true;
        }
        return false;

    }

    public function createNewTask(Employee $employee,Carbon $delivery_date, Appointment $appointment){
        $task = new Task();
        $task->employee()->associate($employee);
        $task->title = 'Appointment Material Delivery';
        $task->due_date = $delivery_date->format('dd-mm-YYYY');
        $task->task = "The following material(s) are required and should be delivered : $appointment->material_name for appoinment $appointment->appointment_code";
        $task->status_id = 1;
        $task->save();
        return $task;
    }
}
