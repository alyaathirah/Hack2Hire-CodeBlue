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

class ActivitySheet implements FromCollection, WithMapping, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function title(): string
    {
        return 'Activities';
    }

    public function headings(): array
    {
        return [
            'Participant Name',
            'Activity Name',
        ];
    }

    public function  map($activity): array
    {
        return [
            $activity->firstname.' '.$activity->lastname,
            $activity->name
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
        return DB::table('activity')
            ->select('activity.name', 'participant.firstname', 'participant.lastname')

            ->leftjoin('activity_participant', 'activity_participant.activity_id', '=', 'activity.id')
            ->leftjoin('participant', 'activity_participant.participant_id', '=', 'participant.id')
            ->get();
    }
}
