<?php

namespace App\Http\Controllers;

use App\Models\ElementTranslation;
use App\Models\ModuleView;
use App\Models\TranslationLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class TranslationController extends Controller
{
    public function index($view_id)
    {
        try {
            $view = ModuleView::find($view_id);

            if (!$view) {
                throw new \Exception('View Module not found');
            }

            $view_translation_object = new stdClass();

            DB::table('elements')
                ->where('view_id', $view_id)
                ->leftJoin('element_translations', function ($join) {
                    $join->on('elements.id', '=', 'element_translations.element_id')
                        ->where('element_translations.language_id', 1);
                })
                ->leftJoin('translation_languages', 'element_translations.language_id', '=', 'translation_languages.id')
                ->select('elements.id', 'elements.slug', 'elements.icon', 'elements.label', 'element_translations.id as translation_id', 'element_translations.translation', 'translation_languages.id as language_id', 'translation_languages.language')
                ->orderBy('id')
                ->lazy()->each(function ($translation) use (&$view_translation_object) {
                    $view_translation_object->{$translation->id} = $translation;
                });

            $translation_object = new stdClass();
            $translation_object->{$view->view} = $view_translation_object;

            return $this->sendResponse($translation_object);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    public function index_v2($view_id)
    {
        $view = ModuleView::find($view_id);

        //        $view_translation_object = new stdClass();

        $translations = DB::table('elements')
            ->where('view_id', $view_id)
            ->leftJoin('element_translations', function ($join) {
                $join->on('elements.id', '=', 'element_translations.element_id')
                    ->where('element_translations.language_id', 1);
            })
            ->leftJoin('translation_languages', 'element_translations.language_id', '=', 'translation_languages.id')
            ->select('elements.id', 'elements.icon', 'elements.slug', 'element_translations.translation')
            ->get();

        //        $translation_object = new stdClass();
        //        $translation_object->{$view->view} = $view_translation_object;

        return response()->json($translations);
    }

    public function create_translation()
    {
        $validator = Validator::make(request()->all(), [
            'id' => 'required|exists:elements',
            'language_id' => 'required|exists:translation_languages,id',
            'translation' => 'required',
        ]);

        if ($validator->fails()) return response()->json($validator->errors());

        $validated = $validator->validated();

        $element = DB::table('elements')
            ->where('elements.id', $validated['id'])
            ->leftJoin('module_views', 'elements.view_id', '=', 'module_views.id')
            ->select('elements.id', 'elements.label', 'module_views.view')
            ->get()[0];

        $translation_exists = DB::table('element_translations')
            ->where('element_id', $validated['id'])
            ->where('id', $validated['translation_id'] ?? null)
            ->where('language_id', $validated['language_id'])
            ->exists();

        if ($translation_exists) :
            $translation = ElementTranslation::find(request()->translation_id);
            $translation->update(['translation' => $validated['translation']]);

            $element->translation_id = $translation->id;
            $element->translation = $translation->translation;

        else :
            $translation = ElementTranslation::create([
                'element_id' => $validated['id'],
                'language_id' => $validated['language_id'],
                'translation' => $validated['translation'],
                'created_by' => 1,
            ]);

            $element->translation_id = $translation->id;
            $element->translation = $translation->translation;
        endif;


        $translation_object = new stdClass();
        $element_object = new stdClass();

        if ($validated['language_id'] === 1) :
            $language = TranslationLanguage::find($validated['language_id']);
            $element->language_id = $language->id;
            $element->language = $language->language;


            $element_object->{$element->id} = $element;

            $translation_object->{$element->view} = $element_object;
            unset($element->view);

            return response()->json($translation_object);
        endif;

        return response()->json('null');
    }

    public function all()
    {
        try {
            $views = ModuleView::get();

            $translations = array();
            
            foreach ($views as $view) {
                $view_translation_object = new stdClass();
                DB::table('elements')
                    ->where('view_id', $view->id)
                    ->leftJoin('element_translations', function ($join) {
                        $join->on('elements.id', '=', 'element_translations.element_id')
                            ->where('element_translations.language_id', 1);
                    })
                    ->leftJoin('translation_languages', 'element_translations.language_id', '=', 'translation_languages.id')
                    ->select('elements.id', 'elements.slug', 'element_translations.translation')
                    ->orderBy('id')
                    ->lazy()->each(function ($translation) use (&$view_translation_object) {
                        $view_translation_object->{$translation->id} = $translation;
                    });

                $translation_object = new stdClass();
                $translation_object->{$view->view} = $view_translation_object;

                array_push($translations, $translation_object);
            }

            return $this->sendResponse($translations);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }
}
