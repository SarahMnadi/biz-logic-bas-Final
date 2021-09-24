<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Department::truncate();
        //DEPARTMENTS FOR UDSM MAIN CAMPUS
        $mainCampusBranch = Branch::find(1);
        $geologydepartment = new Department();
        $geologydepartment->department_id = 1;
        $geologydepartment->department_name = 'DEPARTMENT OF GEOLOGY';
        $geologydepartment->department_phone_number = '0674565747';
        $geologydepartment->department_email = 'geology.maincampus@udsm.com';
        $geologydepartment->department_address = '23465';
        $mainCampusBranch->departments()->save($geologydepartment);

        $mathematicsdepartment = new Department();
        $mathematicsdepartment->department_id = 2;
        $mathematicsdepartment->department_name = 'DEPARTMENT OF MATHEMATICS';
        $mathematicsdepartment->department_phone_number = '0757342823';
        $mathematicsdepartment->department_email = 'mathematics.maincampus@udsm.com';
        $mathematicsdepartment->department_address = '129740';
        $mainCampusBranch->departments()->save($mathematicsdepartment);

        $socialogydepartment = new Department();
        $socialogydepartment->department_id = 3;
        $socialogydepartment->department_name = 'DEPARTMENT OF SOCIALOGY';
        $socialogydepartment->department_phone_number = '0757342823';
        $socialogydepartment->department_email = 'socialogy.maincampus@udsm.com';
        $socialogydepartment->department_address = '444728';
        $mainCampusBranch->departments()->save($socialogydepartment);

        //DEPARTMENTS FOR UDSM COICT CAMPUS
        $coictampusBranch = Branch::find(2);
        $csedepartment = new Department();
        $csedepartment->department_id = 4;
        $csedepartment->department_name = 'DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING';
        $csedepartment->department_phone_number = '0657463728';
        $csedepartment->department_email = 'cse.coicts@udsm.com';
        $csedepartment->department_address = '987656';
        $coictampusBranch->departments()->save($csedepartment);

        $tedepartment = new Department();
        $tedepartment->department_id = 5;
        $tedepartment->department_name = 'DEPARTMENT OF TELECOMMUNICATION ENGINEERING';
        $tedepartment->department_phone_number = '0679459494';
        $tedepartment->department_email = 'te.coict@udsm.com';
        $tedepartment->department_address = '543784';
        $coictampusBranch->departments()->save($tedepartment);

        $etedepartment = new Department();
        $etedepartment->department_id = 6;
        $etedepartment->department_name = 'DEPARTMENT OF TELECOMMUNICATION ENGINEERING';
        $etedepartment->department_phone_number = '0679459494';
        $etedepartment->department_email = 'te.coict@udsm.com';
        $etedepartment->department_address = '543784';
        $coictampusBranch->departments()->save($etedepartment);

      
    }
}
