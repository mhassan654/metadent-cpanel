<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

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

    public function sub_department()
    {
        return $this->hasMany(SubDepartment::class,'parent_id');
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
    
}
