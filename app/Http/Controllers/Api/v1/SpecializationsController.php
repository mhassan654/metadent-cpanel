<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;

class SpecializationsController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }


    /**
     * Display a listing of all specializations.
     *  //TIED TO v1/specializations/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Return all patients falling in the given facility id
         return $this->allSpecializations();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            "specialization" => "required",
//            "facility_id" => "required",
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

    /**
     * Display the specified specialization.
     *
     * @param  int  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->customSuccessResponseWithPayload(Specialization::find(request()->specialization));
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

    /**
     * Remove the specified specialization from storage.
     *
     * @param  int  $specializationId
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        request()->validate(["specializationId" => "required"]);

        $specialization = Specialization::find(request()->specializationId);

        if ($specialization)
        {
            $specialization->delete();
            return $this->customSuccessResponseWithMessage("Specialization deleted successfully");

        }else{
            return $this->failure("Sorry Request failed");
        }
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
