<?php

use App\Role;
use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
            'name'   => 'User'
        ]);

        Role::create([
            'name'   => 'Admin'
        ]);

        Role::create([
            'name'   => 'Super Admin'
        ]);
    }
}
