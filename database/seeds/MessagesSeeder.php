<?php

use App\User;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 public messages
        factory(\App\Message::class,30)->create();

        // create 10 private message for each user
        $users = User::all();
        foreach ($users as $user) {
            factory(\App\Message::class,10)->create([
                'type'=>'private',
                'private_group'=>$user->object_type
            ]);
        }
    }
}
