<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // $validator = Validator::make($request->all(), [
                'lang' => 'required',
                'sourceText' => 'required',
                'translationText' => 'required',
            // ])

            // if ($validator->fails()) {
            //     $errors = $validator->errors();
            //     return response()->json($errors->all(), 500);
            // }
        ];
    }
}
