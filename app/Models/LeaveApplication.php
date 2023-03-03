<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveApplication extends Model
{
    use HasFactory;

      /**
     * Get the leaveType that owns the LeaveType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id', 'id');
    }

     /**
     * Get the leaveType that owns the LeaveType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

     /**
     * Get the leaveType that owns the LeaveType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedBy()
    {
        return $this->belongsTo(Employee::class, 'approved_by', 'id');
    }
}
