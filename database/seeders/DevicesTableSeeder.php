<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Device;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Device::truncate();
        //NORMAL ROOM DEVICE
        $csedepartment = Department::find(4);
        $room10 = Room::find(10);
        $deviceA = new Device();
        $deviceA->device_token = 1;
        $deviceA->device_name = "DEVICE A";
        $deviceA->device_type = 'fingerprint';
        $deviceA->organization_id = 1;
        $deviceA->branch_id = 2;
        $deviceA->room()->save($room10);
        $csedepartment->devices()->save($deviceA);

        //NORMAL ROOM DEVICE
        $room2 = Room::find(2);
        $deviceB = new Device();
        $deviceB->device_token = 2;
        $deviceB->device_name = "DEVICE B";
        $deviceB->device_type = 'fingerprint';
        $deviceB->organization_id = 1;
        $deviceB->branch_id = 2;
        $deviceB->room()->save($room2);
        $csedepartment->devices()->save($deviceB);

        //SENSITIVE ROOM DEVICE
        $room3 = Room::find(3);
        $deviceC = new Device();
        $deviceC->device_token = 3;
        $deviceC->device_name = "DEVICE C";
        $deviceC->device_type = 'fingerprint';
        $deviceC->organization_id = 1;
        $deviceC->branch_id = 2;
        $deviceC->room()->save($room3);
        $csedepartment->devices()->save($deviceC);

        //SENSITIVE ROOM DEVICE
        $room1 = Room::find(1);
        $deviceD = new Device();
        $deviceD->device_token = 4;
        $deviceD->device_name = "DEVICE D";
        $deviceD->device_type = 'rfid';
        $deviceD->organization_id = 1;
        $deviceD->branch_id = 2;
        $deviceD->room()->save($room1);
        $csedepartment->devices()->save($deviceD);

        //SENSITIVE ROOM DEVICE
        $room9 = Room::find(9);
        $deviceE = new Device();
        $deviceE->device_token = 5;
        $deviceE->device_name = "DEVICE E";
        $deviceE->device_type = 'rfid';
        $deviceE->organization_id = 1;
        $deviceE->branch_id = 2;
        $deviceE->room()->save($room9);
        $csedepartment->devices()->save($deviceE);

        //NORMAL ROOM DEVICE
        $room5 = Room::find(5);
        $device6 = new Device();
        $device6->device_token = 6;
        $device6->device_name = "DEVICE 6";
        $device6->device_type = 'rfid';
        $device6->organization_id = 1;
        $device6->branch_id = 2;
        $device6->room()->save($room5);
        $csedepartment->devices()->save($device6);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // // $department->devices()->save($deviceB);

        // $deviceB = new Device();
        // $deviceB->device_token = 2;
        // $deviceB->device_name = "DEVICE B";
        // $deviceB->device_mode = 1;
        // $deviceB->device_location = "Computer Room";
        // $deviceB->organization_id = 1;
        // $deviceB->branch_id = 1;
        // $department->devices()->save($deviceB);
    }
}
