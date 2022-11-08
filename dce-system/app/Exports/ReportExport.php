<?php

namespace App\Exports;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromCollection; //
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
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

class ReportExport implements WithMultipleSheets, WithStyles, ShouldAutoSize, WithProperties
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct()
    {
        // $this->sheets = $sheets;
    }

    public function properties(): array
    {
        return [
            'creator' => 'DELL Charity Event',
            'lastModifiedBy' => 'Admin',
            'title' => 'DCE 2022 Participant Records',
            'description' => 'Participants details for DCE 2022',
            'subject' => 'Participant Record',
            'keywords' => 'participant, record, DCE, dce, 2022, spreadsheet',
            'category' => 'Record',
            'manager' => 'Dell Charity Event',
            'company' => 'DELL'
        ];
    }

    public function sheets(): array
    {
        $sheets = [
            new ParticipantSheet(),
            new ActivitySheet(),
            new NGOSheet()
        ];

        return $sheets;
    }

    // public function title(): string
    // {
    //     return 'Participants';
    // }

    // public function headings(): array
    // {
    //     return [
    //         'First Name',
    //         'Last Name',
    //         'Phone Number',
    //         'Age Category',
    //         'Employee Status',
    //         'Worksite',
    //         'Attend Time',
    //         'Shirt Size',
    //         'Registration Fee',
    //         'NGO'
    //     ];
    // }

    // public function  map($participant): array
    // {
    //     return [
    //         $participant->firstname,
    //         $participant->lastname,
    //         $participant->phone,
    //         $participant->age_category,
    //         $participant->employee_status,
    //         $participant->worksite,
    //         $participant->attend_time,
    //         $participant->shirt_size,
    //         $participant->registration_fee,
    //         $participant->name
    //     ];
    // }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    // public function defaultStyles(Style $defaultStyle)
    // {
    //     return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);

    //     return [
    //         'fill' => [
    //             'fillType' => Fill::FILL_SOLID,
    //             'startColor' => ['argb' => Color::COLOR_RED],
    //         ],
    //     ];
    // }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('/img/logo.jpg'));
    //     $drawing->setHeight(50);
    //     $drawing->setCoordinates('B3');

    //     $drawing2 = new Drawing();
    //     $drawing2->setName('Other image');
    //     $drawing2->setDescription('This is a second image');
    //     $drawing2->setPath(public_path('/img/other.jpg'));
    //     $drawing2->setHeight(120);
    //     $drawing2->setCoordinates('G2');

    //     return [$drawing, $drawing2];
    // }

    // public function backgroundColor()
    // {
    //     //return '000000';

    //     //return new Color(Color::COLOR_BLUE);

    //     return [
    //         'fillType' => Fill::FILL_GRADIENT_LINEAR,
    //         'startColor' => ['argb' => Color::COLOR_RED],
    //     ];
    // }


    

    // public function sheets(): array
    // {
    //     $sheets = [];

    //     for ($int = 1; $int <= 2; $int++) {
    //         $sheets[] = new ExcelWorkSheet($int);
    //     }
    //     return $sheets;

    // }

    // public function view(): view{
    //     return view('invoices', [
    //         'invoices' => Participant::all()
    //     ]);
    // }

    public function query()
    {
        return Participant::query;
    }

    // public function collection()
    // {
    //     return DB::table('participant')
    //         ->select('participant.firstname', 'participant.lastname', 'participant.employee_status', 'participant.worksite', 'participant.phone', 'participant.shirt_size', 'participant.age_category', 'participant.attend_time', 'participant.registration_fee','participant.created_at',

    //         'ngo.name')

    //     ->leftjoin('ngo', 'participant.ngo_id', '=', 'ngo.id')
    //     ->get();
    // }
}
