<?php

namespace App\Exports;

use App\Models\Treatment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TreatmentsExport implements FromCollection, withHeadings, withMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Treatment::all();
    }

    public function  headings(): array
    {
        // TODO: Implement headings() method.
        return ['id', 'treatment','code','prices','category', 'subcategory'];
    }

    public function map($treatment): array
    {
        // TODO: Implement map() method.
        return [
            $treatment->id,
            $treatment->treatment,
            $treatment->code,
            $treatment->price,
            $treatment->treatment_category,
            $treatment->subcategory,
//            $treatment->user->name,
//            Date::dateTimeToExcel($treatment->created_at),
        ];
    }
}
