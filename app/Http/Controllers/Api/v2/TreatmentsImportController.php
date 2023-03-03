<?php

namespace App\Http\Controllers\Api\v2;

use App\Exports\TreatmentsExport;
use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\ApiBaseController;
use App\Imports\TreatmentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TreatmentsImportController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api",'role:Accounts Manager']);
//        $this->middleware(['role:Super-Admin']);
//        $this->middleware('permission:View Invoices', ['only' => ['index','allInvoices']]);
//        $this->middleware('permission:Create Invoice', ['only' => ['store']]);
//        $this->middleware('permission:Update Invoice', ['only' => ['update']]);
//        $this->middleware('permission:Delete Invoice', ['only' => ['delete']]);
    }

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
