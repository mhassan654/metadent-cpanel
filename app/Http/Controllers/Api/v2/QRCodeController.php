<?php

//Created by Mulindwa Denis

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Appointment;
use Carbon\Carbon;

class QRCodeController extends BaseController {

    public function index()
    {
        return view('qrcode');
    }

}
