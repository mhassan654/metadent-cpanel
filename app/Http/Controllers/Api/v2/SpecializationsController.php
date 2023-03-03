<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpecializationsController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(['role:Super-Admin']);
//        $this->middleware('permission:role-create', ['only' => ['create','store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of all specializations.
     *  //TIED TO v1/specializations/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if ($this->authUser()->hasRole('Super-Admin')) {
            // Return all patients falling in the given facility id
            return $this->allSpecializations();
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if ($this->authUser()->hasRole('Super-Admin')) {
            request()->validate([
                "specialization" => "required",
//                "facility_id" => "required",
            ]);

            $newSpecialization = Specialization::create([
                "specialization" => request()->specialization,
                "facility_id" => Auth::user()->facility_id,
            ]);

            if ($newSpecialization) {
                return $this->specialization($newSpecialization);
            }

            return $this->failure("Specializtion was not created");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    /**
     * Display the specified specialization.
     *
     * @param  int  $specialization
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        if ($this->authUser()->hasRole('Super-Admin')) {

        return $this->customSuccessResponseWithPayload(Specialization::find(request()->specialization));

        }
        return $this->customFailResponseWithPayload('Permission denied');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        if ($this->authUser()->hasRole('Super-Admin')) {

        $request->validate(["specializationId" => "required"]);

        $specialization = Specialization::find($request->id);

        if ($specialization) {
            $specialization->update([
                "specialization" => $request->specialization,
            ]);

            return $this->specialization(Specialization::find($request->specializationId));
        }

        return $this->customFailResponseWithPayload("Specialization not found");

        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    /**
     * Remove the specified specialization from storage.
     *
     * @param  int  $specializationId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
        if ($this->authUser()->hasRole('Super-Admin')) {
            $validator = Validator::make(request() -> all(),[
                "agendaId" => "required"
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }
        request()->validate(["specializationId" => "required"]);

        $specialization = Specialization::find(request()->specializationId);

        if ($specialization)
        {
            $specialization->delete();
            return $this->customSuccessResponseWithMessage("Specialization deleted successfully");

        }

            return $this->failure("Sorry Request failed");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }


    private function specialization($specialization)
    {
        return $this->customSuccessResponseWithPayload($specialization);
    }

    private function allSpecializations()
    {
        return $this->customSuccessResponseWithPayload(
            Specialization::orderBy("created_at", "desc")->get()
        );
    }
}
