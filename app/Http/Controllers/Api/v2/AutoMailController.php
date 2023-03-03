<?php
// Created by Mulindwa Denis

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\AutoMail;
use App\Models\AutoMailCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AutoMailController extends Controller {

    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function add_auto_mail(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'body' => 'required',
                'subject' => 'required|unique:auto_mails,subject',
                'category_id' => 'required'
            ]);
            if($validator->fails()){
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $mail = AutoMail::find($request->category_id);
                if(is_null($mail)) {
                    $auto_mail = new AutoMail;
                    $auto_mail->subject = $request->subject;
                    $auto_mail->body = $request->body;
                    $auto_mail->category_id = $request->category_id;
                    $auto_mail->save();
                    if($auto_mail){
                        return $this->customSuccessResponseWithPayload($auto_mail);
                    } else {
                        return $this->customFailResponseWithPayload('Mail Not Created');
                    }
                } else {
                    return $this->customFailResponseWithPayload('Category Already has the mail');
                }
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function fetch_auto_mails()
    {
        try {
            $auto_mails = AutoMail::orderBy('created_at','desc')->with(['category'])->get();
            return $this->customSuccessResponseWithPayload($auto_mails);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function fetch_auto_mails_category()
    {
        try {
            $auto_mails_categories = AutoMailCategory::orderBy('created_at','desc')->get();
            return $this->customSuccessResponseWithPayload($auto_mails_categories);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update_auto_mail(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'mailId' => 'required',
                'body' => 'required',
                'subject' => 'required|unique:auto_mails,subject'
            ]);
            if($validator->fails()){
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $auto_mail = AutoMail::find($request->mailId);
                $auto_mail->subject = $request->subject;
                $auto_mail->body = $request->body;
                $auto_mail->update();
                if($auto_mail) {
                    return $this->customSuccessResponseWithPayload($auto_mail);
                } else {
                    return $this->customFailResponseWithPayload('Mail Not Updated');
                }
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function delete_auto_mail(Request $request)
    {
        try {
            $auto_mail = AutoMail::find($request->mailId);
            if($auto_mail){
                $auto_mail->forceDelete();
                return $this->customSuccessResponseWithPayload($auto_mail);
            } else {
                return $this->customFailResponseWithPayload('Mail Not Deleted');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
