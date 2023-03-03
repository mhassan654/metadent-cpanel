<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TreatmentCategory;
use Illuminate\Support\Facades\Auth;

class TreatmentCategoriesController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->allTreatmentCategories();
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesData()
    {
        return $this->categories();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "parent_id" =>"nullable"
        ]);

        $categoryExists = TreatmentCategory::where(['name' => $request->name])->first();
        if($categoryExists)
        {
            return $this->customFailResponseWithPayload("Category, {$request->name} already exists.");
        }
        $newTreatmentCategory = TreatmentCategory::create([
            "name" => $request->name,
            "parent_id" => $request->parent_id ? $request->parent_id : 0,
            "facility_id" => 1,
        ]);

        if($newTreatmentCategory)
        {
            return $this->allTreatmentCategories();
        }

        return $this->customFailResponseWithPayload("Treatment Category failed to be created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        request()->validate([
            "treatmentCatId" => "required",
        ]);

        $treatmentCategory = TreatmentCategory::find($request->treatmentCatId);

        if($treatmentCategory)
        {
            return $this->customSuccessResponseWithPayload($treatmentCategory);
        }

        return $this->customFailResponseWithPayload("Treatment Category not found");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        request()->validate([
            "treatmentCatId" => "required",
        ]);

        $treatmentCategory = TreatmentCategory::find(request()->treatmentCatId);

        if($treatmentCategory)
        {
            $treatmentCategory->update([
                "name" => request()->name,
                "parent_id" => request()->parent_id !== null ? request()->parent_id : $treatmentCategory->parent_id,
            ]);

            return $this->categories();
        }

        return $this->customFailResponseWithPayload("Category update failed");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        request()->validate([
            "categoryId" => "required",
        ]);

        $treatmentCategory = TreatmentCategory::find(request()->categoryId);

        if($treatmentCategory)
        {
            $treatmentCategory->delete();

            return $this->categories();
        }

        return $this->customFailResponseWithPayload("Category not found");
    }

    public function deleteCategory($id)
    {
       $single_user_id = explode(',' , $id);

       foreach($single_user_id as $id) {
           TreatmentCategory::findOrFail($id)->delete();
       }
       return $this->customSuccessResponseWithPayload("Deleted successfully");

    }

    private function allTreatmentCategories()
    {
        return $this->customSuccessResponseWithPayload(TreatmentCategory::with('parentCategory')->orderBy("created_at", "desc")->paginate());
    }

    private function categories()
    {
        return $this->customSuccessResponseWithPayload(TreatmentCategory::orderBy("created_at", "desc")->get());
    }
}
