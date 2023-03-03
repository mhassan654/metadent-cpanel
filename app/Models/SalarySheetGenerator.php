<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySheetGenerator extends Model
{
    use HasFactory;

    protected $table = 'salary_sheet_generator';
    // protected $primaryKey ='ssg_id';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'g_date',
        'generate_by',
    ];

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('id', $this->id);
    }
}
