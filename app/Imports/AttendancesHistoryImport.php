<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\AttendanceHistory;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;

class AttendancesHistoryImport implements ToModel, withStartRow, WithHeadingRow, WithProgressBar, WithChunkReading, SkipsEmptyRows
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

        $importAttendanceHistories = new AttendanceHistory([
            'date'  => $this->transformDate($row['date']),
            'check_in' => $this->transformToDateTime($row['check_in']),
            'employee_id' => $row['employee_id'],
            "facility_id" => Auth::user()->facility_id
        ]);

        return $importAttendanceHistories;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function transformDate($value, $format = 'd-m-Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException$e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function transformToDateTime($value, $format = 'd-m-Y H:i:s')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException$e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

}
