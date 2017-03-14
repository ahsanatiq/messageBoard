<?php
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
        'object_type' => $faker->randomElement(['delta', 'alfa', 'beta', 'gamma']),
        'remember_token' => str_random(64),
        'role_id' => $faker->randomDigit
    ];
});
