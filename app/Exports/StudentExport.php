<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentExport implements FromView,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): \Illuminate\Contracts\View\View
    {
        return view('studentExport',[
            'students'=>Student::all(),
            'headings' => [
                'ID',
                'Created At',
                'Updated At',
                'Name',
                'Email',
                'Phone no',
                'Address',
                'Registration no',
                'Department',
                'Photo'
            ]
            ]);
    }
    public function registerEvents(): array
    {
        return[ AfterSheet::class => function(AfterSheet $afterSheet){
            $afterSheet->sheet->getStyle('A1:J1')->ApplyFromArray(
                [
                    'font'=>[
                        'bold'=>true
                    ],
                ],
            );
        }];
        
    }

    
}
