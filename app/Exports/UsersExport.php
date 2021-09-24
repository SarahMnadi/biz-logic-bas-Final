<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements
  
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
        return User::query()->with('organization')->with('branch')->with('department');
    }

    //MAP METHOD TO MAP DATA TO BE PULLED
    public function map($user): array
    {
        return [
            $user->user_id,
            $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name,
            $user->email,
            $user->phone_number,
            $user->birth_date,
            $user->organization->organization_name,
            $user->branch->branch_name,
            $user->department->department_name
        ];
    }

    //METHOD TO CREATE HEADINGS TO THE EXCEL
    public function headings(): array
    {
        return [
            'USER_ID',
            'FULL NAME',
            'EMAIL',
            'PHONE NUMBER',
            'BIRTH DATE',
            'ORGANIZATION',
            'BRANCH',
            'DEPARTMENT'

        ];
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
