<?php

namespace App\Exports;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromCollection; //
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets; //
use Maatwebsite\Excel\Concerns\WithMapping; //
use Maatwebsite\Excel\Concerns\WithHeadings; //
use Maatwebsite\Excel\Concerns\WithStyles; //
use Maatwebsite\Excel\Concerns\WithDefaultStyles; //
use Maatwebsite\Excel\Concerns\ShouldAutoSize; //
use Maatwebsite\Excel\Concerns\WithTitle;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;

class NGOSheet implements FromCollection, WithMapping, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function title(): string
    {
        return 'NGO';
    }

    public function headings(): array
    {
        return [
            'NGO Name',
            'Total Amount',
        ];
    }

    public function  map($ngo): array
    {
        return [
            $ngo->name,
            $ngo->total_amount
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function collection()
    {
        return DB::table('ngo')
            ->select('ngo.name', 'ngo.total_amount')
        ->get();
    }
}
