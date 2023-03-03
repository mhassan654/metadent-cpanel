<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Imports\PatientsImport;
use App\Http\Controllers\ApiBaseController;
use Maatwebsite\Excel\Facades\Excel;

class BulkDataImportController extends BaseController
{
    public function import_patients(Request $request)
    {
        try {
            $request->validate([ 'patients_import' => 'required|file|mimes:xls,xlsx,csv'
        ]);

        $path = $request->file('patients_import');

        $data = Excel::import(new PatientsImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
        } catch (\Throwable $th) {
          return $th->getMessage();
        }



    }
}
