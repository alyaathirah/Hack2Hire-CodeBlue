<?php

namespace App\Exports;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromCollection; //
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMultipleSheets; //
use Maatwebsite\Excel\Concerns\WithMapping; //
use Maatwebsite\Excel\Concerns\WithHeadings; //
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles; //
use Maatwebsite\Excel\Concerns\WithDefaultStyles; //
use Maatwebsite\Excel\Concerns\ShouldAutoSize; //
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Drawing;

class ParticipantSheet implements FromCollection, WithMapping, WithTitle, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function title(): string
    {
        return 'Participants';
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Phone Number',
            'Age Category',
            'Employee Status',
            'Worksite',
            'Attend Time',
            'Shirt Size',
            'Registration Fee',
            'NGO'
        ];
    }

    public function  map($participant): array
    {
        return [
            $participant->firstname,
            $participant->lastname,
            $participant->phone,
            $participant->age_category,
            $participant->employee_status,
            $participant->worksite,
            $participant->attend_time,
            $participant->shirt_size,
            $participant->registration_fee,
            $participant->name
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
        return DB::table('participant')
            ->select('participant.firstname', 'participant.lastname', 'participant.employee_status', 'participant.worksite', 'participant.phone', 'participant.shirt_size', 'participant.age_category', 'participant.attend_time', 'participant.registration_fee','participant.created_at',

            'ngo.name')

        ->leftjoin('ngo', 'participant.ngo_id', '=', 'ngo.id')
        ->get();
    }
}
