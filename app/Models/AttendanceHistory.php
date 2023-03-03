<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceHistory extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'check_in','check_out','employee_id','facility_id'];

    /**
     * Get all of the employee for the AttendanceHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employee()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }

    function get_employee_late_closing_attendance($employee_id, $year, $month)
    {
        $from_date = $year.'-'.$month.'-'.'1';
		$to_date   = date("Y-m-t", strtotime($from_date));

	    $att = "SELECT *, DATE(time) as mydate FROM `attendance_histories` WHERE `uid`=$employee_id AND DATE(time) BETWEEN
		'" . $from_date . "' AND  '" . $to_date . "' GROUP BY mydate ORDER BY time asc";
	    $query = $this->db->query($att)->result();
	    $att_in = [];

		$i=1;

		foreach ($query as $attendance) {

		    $att_in[$i] =
			$this->db->select('a.time,MIN(a.time) as intime,MAX(a.time) as outtime,a.uid')
				->from('attendance_history a')
				->like('a.time',date( "Y-m-d", strtotime($attendance->mydate)),'after')
				->where('a.uid',$attendance->uid)
				->order_by('a.time','DESC')
				->get()
				->result();

			$i++;
		}

		return $att_in;
    }
}
