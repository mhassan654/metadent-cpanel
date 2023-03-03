<?php

namespace App\Http\Controllers\Api\v1;

use App\Exports\TreatmentsExport;
use Illuminate\Http\Request;
use App\Imports\TreatmentsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class TreatmentsImporterController extends Controller
{
    public function import(Request $request)
    {
         $request->validate([ 'import_file' => 'required|file|mimes:xls,xlsx,csv'
        ]);

        $path = $request->file('import_file');

        $data = Excel::import(new TreatmentsImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }

    public function export()
    {
        return Excel::download(new TreatmentsExport, 'treatments.xlsx');
    }

    public function  exportToXSLX()
    {
        return (new TreatmentsExport)->download('treatments.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function exportToCSV()
    {
        return (new TreatmentsExport)->download('treatments.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
