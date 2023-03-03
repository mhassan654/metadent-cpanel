<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDepartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departments';

    protected $fillable = [
        "department",
        "facility_id"
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    /**
     * Get the parent_department that owns the SubDepartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent_department()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }
}
