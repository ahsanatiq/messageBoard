<?php
use App\Role;
use App\User;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'country' => $faker->countryCode,
        'city' => $faker->city,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->url,
        'region' => $faker->word,
        'district' => $faker->word,
        'object_type' => $faker->randomElement(['delta', 'alfa', 'beta', 'gamma']),
        'remember_token' => str_random(64),
        'role_id' => $faker->randomElement(['1', '2', '3'])
    ];
});
$factory->define(App\Message::class, function (Faker\Generator $faker) {
    $adminRole = Role::whereName('Admin')->first();
    return [
        'name' => $faker->name,
        'detail' => $faker->paragraph(),
        'type' => $faker->randomElement(['public', 'private']),
        'user_id' => User::where('role_id',$adminRole->id)->first()->id
    ];
});
