<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTranslationRequest;
use App\Models\Translation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

class TranslationsController extends Controller
{
    public function construct()
    {
//        $this->middleware(["auth:api"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility_lang = get_facility_setting('lang');

        return Translation::where('lang',$facility_lang)->get();
    }

    public function locale($locale)
    {
        return Cache::rememberForever("frontend-translations-{$locale}", function () use ($locale){
            return Translation::where('lang',$locale)->pluck('translation_text','source_text')->toJson();
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'title' => 'required',
            'sourceText' => 'required',
            'translationText' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $translationExists = Translation::where(['lang' => $request->input('lang'), 'source_text' => $request->input('sourceText')])->exists();

        $translation = Translation::firstOrNew(['lang' => $request->input('lang'), 'source_text' => $request->input('sourceText')]);

        if ($translationExists === false) {
            $translation->lang = $request->input('lang');
            $translation->source_text = $request->input('sourceText');
            $translation->title = $translation->title ?? $request->input('title');
            $translation->translation_text = $request->input('translationText');
            $translation->save();

            if ($translation) {
                return $this->customSuccessResponseWithPayload('Translation created');
            }

        }
            return $this->customFailResponseWithPayload('Translation already exists');



        Artisan::call('cache:clear');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarnslation  $translation
     * @return \Illuminate\Http\Response
     */
    public function get_all_translations()
    {

        $language_code = get_facility_setting('lang');
        return Cache::rememberForever("frontend-translations-{$language_code}", function () use ($language_code) {
            return $this->customSuccessResponseWithPayload(json_decode(Translation::where('lang', $language_code)->pluck('translation_text', 'source_text')->toJson()));
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanslation  $tanslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanslation $tanslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTanslationRequest  $request
     * @param  \App\Models\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sourceText' => 'required',
            'translationText' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($errors->all(), 500);
        }

        try {

            $facility_lang = get_facility_setting('lang');

            $translation = Translation::firstOrNew(['lang' => $facility_lang, 'source_text' => $request->input('sourceText')]);

            $translation->lang = $facility_lang;
            $translation->source_text = $request->input('sourceText');
            $translation->title = $translation->title ?? $request->input('title');
            $translation->translation_text = $request->input('translationText');
            $translation->save();

            Artisan::call('optimize:clear');
            Artisan::call('cache:clear');

            return $this->customSuccessResponseWithMessage('Translation updated');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
