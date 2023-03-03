<?php
/**
 **Created by MUWONGE HASSAN on 03/02/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use App\Models\LogActivity as LogActivityModel;
use KitLoong\MigrationsGenerator\Migration\Generator\Modifiers\NullableModifier;

class LogActivity
{

    public static function addToLog($subject, $action = null, $patient_id = null, $section = null, $employee_id = null, $invoice_id = null, $user_id = null, $appointment_id =null)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['date'] = Carbon::now();
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['patient_id'] = $patient_id;
        $log['action'] = $action;
        $log['section'] = $section;
        $log['employee_id'] = $employee_id;
        $log['invoice_id'] = $invoice_id;
        $log['appointment_id'] = $appointment_id;
        $log['user_id'] = auth()->check() ? auth()->user()->id : $user_id;
        $log['facility_id'] = auth()->check() ? auth()->user()->facility_id : null;
        LogActivityModel::create($log);
    }

    public static function logActivityLists()
    {
        return LogActivityModel::latest()->paginate(10);
    }
}