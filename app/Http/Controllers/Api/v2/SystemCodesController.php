<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Models\SystemCode;
use App\Modules\Common\Helper;

class SystemCodesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $codes = SystemCode::latest()->get();
            return $this->customSuccessResponseWithPayload($codes);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            Helper::custom_validator($request->all(),['code' => 'required','description' => 'required']);

            $code = SystemCode::create([
                'code' => $request->code,
                'description' => $request->description
            ]);

            if($code) {
                return $this->customSuccessResponseWithPayload($code);
            }

            return $this->customFailResponseWithPayload('Code not Created');

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {

            Helper::custom_validator($request->all(),['codeId' => 'required|integer']);

            $code = SystemCode::find($request->codeId);

            if($code) {

                return $this->customSuccessResponseWithPayload($code);

            }

            return $this->customFailResponseWithPayload('Code not Found');

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            Helper::custom_validator($request->all(),['codeId' => 'required|integer', 'code' => 'required','description' => 'required']);

            $code = SystemCode::find($request->codeId);

            if($code) {
                $code->update([
                    'code' => $request->code,
                    'description' => $request->description
                ]);

                return $this->customSuccessResponseWithPayload($code);
            }

            return $this->customFailResponseWithPayload('Code not Updated');

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            Helper::custom_validator($request->all(),['codeId' => 'required|integer']);

            $code = SystemCode::find($request->codeId);

            if($code) {

                $code->delete();

                return $this->customSuccessResponseWithPayload('Code Deleted');

            }

            return $this->customFailResponseWithPayload('Code not Deleted');

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
