<?php
/**
 **Created by MUWONGE HASSAN on 21/05/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TreatmentType extends Model
{
    use HasFactory;

    protected $fillable =[
        'facility_id',
        'title',
        'procedures',
        'color',
        'code',
        'date'
    ];

    protected $casts = [
        'procedures' => 'array',
    ];

    public function appointments(): hasMany
    {
        return $this->hasMany(Appointment::class,'treatment_id');
    }
}
