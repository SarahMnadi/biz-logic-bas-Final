<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Room::truncate();
        Room::create([
            'room_id' => '1',
            'room_name' => 'COMPUTER LAB',
            'room_security_level' => 'SENSITIVE'
        ]);
        Room::create([
            'room_id' => '2',
            'room_name' => 'STAFF CAFETERIA',
            'room_security_level' => 'NORMAL'
        ]);
        Room::create([
            'room_id' => '3',
            'room_name' => 'SERVER ROOM',
            'room_security_level' => 'SENSITIVE'
        ]);
        Room::create([
            'room_id' => '4',
            'room_name' => 'B304',
            'room_security_level' => 'SENSITIVE'
        ]);
        Room::create([
            'room_id' => '5',
            'room_name' => 'B307',
            'room_security_level' => 'NORMAL'
        ]);
        Room::create([
            'room_id' => '6',
            'room_name' => 'DO1 LUHANGA HALL',
            'room_security_level' => 'NORMAL'
        ]);
        Room::create([
            'room_id' => '7',
            'room_name' => 'C2/C3',
            'room_security_level' => 'NORMAL'
        ]);
        Room::create([
            'room_id' => '8',
            'room_name' => 'ADMINISTRATION ENTRANCE',
            'room_security_level' => 'NORMAL'
        ]);
        Room::create([
            'room_id' => '9',
            'room_name' => 'RESEARCH ROOM',
            'room_security_level' => 'SENSITIVE'
        ]);
        Room::create([
            'room_id' => '10',
            'room_name' => 'STUDENT CAFETERIA',
            'room_security_level' => 'NORMAL'
        ]);
    }
}
