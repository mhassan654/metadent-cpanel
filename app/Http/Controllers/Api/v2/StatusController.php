<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;

class StatusController extends BaseController
{
    public function index()
    {
        return $this->customSuccessResponseWithPayload(Status::all());
    }
}
