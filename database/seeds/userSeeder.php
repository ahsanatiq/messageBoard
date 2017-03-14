<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $superAdminRole = Role::whereName('superadmin')->first();

        $user = factory(App\User::class)->create([
            'email' => 'superadmin@abc.com',
            'password' => bcrypt('superadmin'),
            'role_id' => $superAdminRole->id
        ]);


    }
}
