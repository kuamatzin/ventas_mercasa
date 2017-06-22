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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => /*$faker->unique()->safeEmail*/ 'kuamatzin@gmail.com',
        'password' => $password ?: $password = bcrypt('1123581321'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});


$factory->define(App\Apartment::class, function (Faker\Generator $faker) {
    $level = ['planta baja', 'segundo nivel', 'tercer nivel', 'cuarto_nivel'];

    return [
        'credit_type' => random_int(1, 3),
        'walker' => random_int(1, 20),
        'level' => $level[random_int(0, 3)],
        'lot' => random_int(1, 20),
        'block' => random_int(1, 10),
        'number' => random_int(1, 200),
        'price' => random_int(400000, 900000),
        'availability' => true
    ];
});

$factory->define(App\Promoter::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Sale::class, function (Faker\Generator $faker) {
    $pdf = ['Si', 'No'];

    return [
        'client_name' => $faker->name,
        'client_nss' => $faker->uuid,
        'client_id' => $faker->uuid,
        'client_birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'water_contract' => random_int(1, 3),
        'credit' => random_int(80000, 200000),
        'new_pregrade' => ['1000', '2000', '3000'],
        'advance' => random_int(20000, 100000),
        'saving' => random_int(20000, 40000),
        'contract_number' => random_int(10000, 500000),
        'commission' => random_int(1500, 6000),
        'case_file' => random_int(1, 3),
        'appraisal_value' => random_int(1, 3),
        'pdf_backup' => $pdf[random_int(0, 1)],
        'sic_format' => random_int(1, 3),
        'status' => random_int(1, 6),
        'letter_commitment_subsidy_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'credit_record_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'judgment_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'freedom_tax_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sign_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'deliver_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'numero_escritura' => random_int(12000, 15000),
        'fecha_escritura' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'numero_folio_mercantil' => random_int(12000, 15000),
        'fecha_folio_mercantil' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
        'domicilio_fiscal' => $faker->address,
        'rfc_vendedor' => $faker->uuid,
        'nacionalidad' => 'Mexicana',
        'lugar_nacimiento' => $faker->state,
        'estado_civil' => 'Soltero',
        'ocupacion' => 'Asalariado',
        'rfc_cliente' => $faker->uuid,
        'esquema' => 'Esquema',
        'precio_total_operacion' => random_int(200000, 1000000),
        'direccion_vendedor' => $faker->address,
        'direccion_comprador' => $faker->address,
        'estado_firma' => $faker->state,
        'fecha_firma_contrato' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'documento_identificacion' => 'IFE',
        'lugar_recepcion' => $faker->state,
        'fecha_recepcion' =>  $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});


