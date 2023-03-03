<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "task",
        "due_date",
        "employee_id",
        "facility_id",
        "doctor_id",
        "status_id",
        "created_by",
        "read",
    ];

    /**
     * Get all of the doctor for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id')->role('Doctor');
    }

     /**
     * Get all of the doctor for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

     /**
     * Get all of the doctor for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    protected $casts = [
        'read' => 'boolean'
    ];

}
