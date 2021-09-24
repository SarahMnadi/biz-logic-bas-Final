<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganizationsTableSeeder::class);
        $this->call(BranchsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
       
        // $this->call(LogsTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
