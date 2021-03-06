<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(roleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(MessagesSeeder::class);
    }
}
