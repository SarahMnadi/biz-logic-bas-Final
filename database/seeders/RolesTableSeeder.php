<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create([
            'name' => 'admin',
            'description' => 'This is the general system user with all privelleges'
        ]);
        // Role::create([
        //     'name' => 'organizationHead',
        //     'description' => 'This is the user who can over seas system functionalities in organization'
        // ]);
        // Role::create([
        //     'name' => 'branchHead',
        //     'description' => 'This is the user who can over seas system functionalities in branch'
        // ]);
        // Role::create([
        //     'name' => 'departmentHead',
        //     'description' => 'This is the user who can over seas system functionalities in department'
        // ]);
        Role::create([
            'name' => 'staff',
            'description' => 'This is the just a normal user will not interact with the system directly'
        ]);
}
}