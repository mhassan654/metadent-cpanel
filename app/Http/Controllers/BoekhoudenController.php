<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountingService\AccountingService as BoekhoudingService;

class BoekhoudenController extends Controller
{
    public function postMutatie()
    {
       return BoekhoudingService::addMutatie(1);
    }
}
