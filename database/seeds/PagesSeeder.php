<?php

use App\Page;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        Page::create([
            'name'   => 'Home',
            'detail' => 'Welcome',
            'menu_name' => 'Home',
            'status' => 'active',
            'user_id' => User::whereEmail('superadmin@abc.com')->get()->first()->id
        ]);
    }
}
