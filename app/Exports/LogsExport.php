<?php

namespace App\Exports;

use App\Models\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class LogsExport implements
  
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents,
    FromQuery
{
    /**
     * @return \Illuminate\Support\Collection
     */
    //COLLECTION METHOD TO PULL DATA FROM DATABASE
    public function query()
    {
        return Log::all(); 
    }


    //MAP METHOD TO MAP DATA TO BE PULLED
    public function map($log): array
    {
        return [
            $log->user_id,
            // $log->first_name . ' ' . $log->middle_name . ' ' . $log->last_name,
            $log->time_in,
            $log->time_out,
            $log->status,
        ];
    }
    //METHOD TO CREATE HEADINGS TO THE EXCEL
public function headings(): array
{
    return [
        'USER_ID',
        'FULL NAME',
        'EMAIL',
        'TIME_IN',
        'TIME_OUT',
        'STATUS',
    

    ];
}

        public function collection(){
            return collect(Log::getLog());
        }


    //METHOD TO STYLE SHEET HEADER
    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:H1')->applyFromArray([

                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
