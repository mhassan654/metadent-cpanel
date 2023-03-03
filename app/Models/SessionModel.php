<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SessionModel extends Model
{
    public $table = 'sessions';
    public $timestamps = false;
    protected  $fillable =['employee_id'];

    /**
     * * Updates the session of the current user.
     * * * @param $query
     * @return Builder
     */
    public function scopeUpdateCurrent($query)
    {
        return $query->where('id', Session::getId())->update(
            array( 'employee_id' => 1));
    }
}
