<?php

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\ZorgMail\ZorgConnect;
use App\Http\Controllers\ApiBaseController;
use Exception;

class ZorgMailController extends BaseController
{
    private $service;
    public function __construct(ZorgConnect $service)
    {
        $this->service = $service;
    }

    //folders
    public function listFolder(){
        // return 200;
        try{
        return $this->service->getFolders();
        } catch(Exception $ex){

            return $this->customFailResponseWithPayload($ex->getMessage());
        }
    }

    //inbox messages
    public function inbox_os()
    {

        $all_mgs = $this->service->fetchMessages(INBOX);
        return $this->customSuccessResponseWithPayload($all_mgs);
    }

    // open message
    public function openMessage(){

        return $this->service->message(request()->message_id);

    }

    // //inbox messages
    // public function sent()
    // {
    // //    return $this->service->getConnect();
    // }

    // //Drafts messages
    // public function drafts()
    // {
    // //    return $this->service->getConnect();
    // }

    // //Junk messages
    // public function Junk()
    // {
    // //    return $this->service->getConnect();
    // }
}
