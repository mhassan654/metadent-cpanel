<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Currency;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(Currency::latest()->get());
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
     * @param  \App\Http\Requests\StoreCurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrencyRequest $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'exchangeRate' => 'nullable',
                'currency' => 'required',
                'currencyCode' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $currency = new Currency;
                $currency->currency = $request->currency;
                $currency->currency_code = $request->currencyCode;
                $currency->exchange_rate = $request->exchangeRate;
                $currency->symbol = $request->currencySymbol;
                $currency->status = 0;
                $currency->save();
                if($currency){
                    return $this->customSuccessResponseWithPayload($currency);
                }
                return $this->customFailResponseWithPayload('Not Created');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrencyRequest  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrencyRequest $request,$id)
    {
        try {
            $validator = Validator::make($request->all(),[
                'exchangeRate' => 'nullable',
                'currency' => 'required',
                'currencyCode' => 'required',
                'status' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $currency = Currency::find($id);
                $currency->currency = $request->currency;
                $currency->currency_code = $request->currencyCode;
                $currency->exchange_rate = $request->exchangeRate;
                $currency->symbol = $request->currencySymbol;
                $currency->status = $request->status;
                $currency->update();
                if($currency){
                    return $this->customSuccessResponseWithPayload($currency);
                }
                return $this->customFailResponseWithPayload('Not Created');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $currency = Currency::find($id);
            $currency->delete();
            if ($currency) {
                return $this->customSuccessResponseWithPayload('Deleted');
            }
            return $this->customFailResponseWithPayload('Not Deleted');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
