<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Organization::truncate();
        Organization::create([
            'organization_id' => 1,
            'organization_name' => 'UNIVERSITY OF DAR ES SALAAM',
            'organization_phone_number' => '0653470846',
            'organization_email' => 'udsm@udsm.com',
            'organization_address' => '45672'
        ]);

        Organization::create([
            'organization_id' => 2,
            'organization_name' => 'UNIVERSITY OF DODOMA',
            'organization_phone_number' => '0786564524',
            'organization_email' => 'udom@udom.com',
            'organization_address' => '53892'
        ]);
        Organization::create([
            'organization_id' => 3,
            'organization_name' => 'ARDHI UNIVERSITY',
            'organization_phone_number' => '0656786434',
            'organization_email' => 'ardhi@ardhi.com',
            'organization_address' => '23455'
        ]);
        Organization::create([
            'organization_id' => 4,
            'organization_name' => 'MKWAWA UNIVERSITY',
            'organization_phone_number' => '0724536373',
            'organization_email' => 'mkwawa@mkwawa.com',
            'organization_address' => '78548'
        ]);
        Organization::create([
            'organization_id' => 5,
            'organization_name' => 'e-GOVERNMENT AUTHORITY',
            'organization_phone_number' => '0734567864',
            'organization_email' => 'ega@ega.com',
            'organization_address' => '43577'
        ]);
        Organization::create([
            'organization_id' => 6,
            'organization_name' => 'TUMAINI UNIVERSITY',
            'organization_phone_number' => '0765252627',
            'organization_email' => 'tumaini@tumaini.com',
            'organization_address' => '23456'
        ]);
        Organization::create([
            'organization_id' => 7,
            'organization_name' => 'ELITES CONSULTANCY',
            'organization_phone_number' => '0734567864',
            'organization_email' => 'elites@elites.com',
            'organization_address' => '337882'
        ]);
        Organization::create([
            'organization_id' => 8,
            'organization_name' => 'QLICUE DIGITAL AGENCY',
            'organization_phone_number' => '0745632245',
            'organization_email' => 'qlicue@qlicue.com',
            'organization_address' => '35679'
        ]);
        Organization::create([
            'organization_id' => 9,
            'organization_name' => 'HUAWEI TECHNOLOGY',
            'organization_phone_number' => '0632346754',
            'organization_email' => 'huawei@huawei.com',
            'organization_address' => '234534'
        ]);
        Organization::create([
            'organization_id' => 10,
            'organization_name' => 'SOKOINE UNIVERSITY OF AGRICULTURE',
            'organization_phone_number' => '0756425644',
            'organization_email' => 'sua@sua.com',
            'organization_address' => '12456'
        ]);
        Organization::create([
            'organization_id' => 11,
            'organization_name' => 'ZAYONI COLLEGE',
            'organization_phone_number' => '0678456789',
            'organization_email' => 'zayoni@zayoni.com',
            'organization_address' => '456378'
        ]);

    }
}
