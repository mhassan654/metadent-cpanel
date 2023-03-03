<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Models\Timezone;

class TimezoneController extends BaseController
{
    public function all()
    {
        $time_zones = Timezone::all();
        return $this->customSuccessResponseWithPayload($time_zones);
    }
}
