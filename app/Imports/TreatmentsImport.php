<?php

namespace App\Imports;

use App\Models\Treatment;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;

class TreatmentsImport implements ToModel, withStartRow, WithHeadingRow, WithProgressBar, WithChunkReading, SkipsEmptyRows
{
    use Importable;
    use RemembersRowNumber;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $currentRowNumber = $this->getRowNumber();

        return new Treatment([
            'treatment'  => $row['treatment'],
            'code' => $row['code'],
            'treatment_category' => $row['treatment_category'],
            'price' => $row['price'],
            'subcategory' => $row['subcategory'],
            "facility_id" => Auth::user()->facility_id,
        ]);
    }

    /**
     * @return int
     */
    public function startRow():int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}