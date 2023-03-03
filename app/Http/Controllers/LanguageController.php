<?php

namespace App\Http\Controllers;

use App\Models\TranslationLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{
    public function index()
    {
        return response()->json(TranslationLanguage::select('id', 'language')->get());
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'language' => 'required|unique:languages|string'
        ]);

        if ($validator->fails()) return response()->json($validator->errors());

        $validated = $validator->validated();

        TranslationLanguage::create([
            'language' => $validated['language'],
            'created_by' => 1
        ]);

        return response()->json(TranslationLanguage::select('id', 'language')->get());
    }
}
