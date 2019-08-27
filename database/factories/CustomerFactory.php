<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Customer::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        
		//'picture' => $faker->image($filePath,400,300)
        //'photo' => $faker->imageUrl('/images/customers',400,300)
    ];
});
