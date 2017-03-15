<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $superAdminRole = Role::whereName('Super Admin')->first();

        $user = factory(App\User::class)->create([
            'email' => 'superadmin@abc.com',
            'password' => bcrypt('superadmin'),
            'role_id' => $superAdminRole->id
        ]);
//        $user->password=bcrypt('superadmin');
//        $user->save();
    }
}
