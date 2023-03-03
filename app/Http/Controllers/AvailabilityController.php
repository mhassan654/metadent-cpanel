<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function update_employee_availability()
    {
        $doctor = Employee::find(request()->doctorId);

        if ($doctor):
            $doctor->update([
                "contract_start_date" => request()->contractStartDate,
                "contract_end_date" => request()->contractEndDate,
                "interval" => request()->duration,
                "frequency_id" => request()->frequencyId,
                "weeks" => request()->weeks,
                "week_days" => Arr::flatten(array_unique(request()->weekDays)),
                "availability" => request()->availability
            ]);

            return $this->customSuccessResponseWithPayload($doctor);
        endif;

        return $this->customFailResponseWithPayload('Doctor not found');
    }
}
