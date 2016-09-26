<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Provider::class, function (Faker\Generator $faker){
    return [
        'nome' => $faker->company,
        'cnpj' => $faker->creditCardNumber
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker){
    $providers = App\Provider::all()->toArray();

    return [
        'nome' => $faker->word,
        'cod_barras' => $faker->isbn10,
        'fabricante' => $faker->company,
        'provider_id' => random_int($providers[0]['id'], $providers[count($providers)-1]['id'])
    ];
});



$factory->define(App\Store::class, function (Faker\Generator $faker){
    return [
        'nome' => $faker->words(2, true),
        'cep' => $faker->postcode
    ];
});

$factory->define(App\ProductStore::class, function (Faker\Generator $faker){
    $stores = App\Store::all()->toArray();
    $products = App\Product::all()->toArray();

    return [
        'product_id' => random_int($products[0]['id'], $products[count($products)-1]['id']),
        'store_id' => random_int($stores[0]['id'], $stores[count($stores)-1]['id']),
        'preco' => $faker->randomFloat(2, 0, 200),
        'estoque' => random_int(0, 1000)
    ];
});

