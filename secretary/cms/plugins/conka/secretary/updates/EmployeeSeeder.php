<?php


namespace Conka\Secretary\Updates;


use Conka\Secretary\Models\Employee;
use Faker\Factory;
use October\Rain\Database\Updates\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $employee = Employee::create([
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'work_phone' => $faker->e164PhoneNumber,
            'secondary_phone' => $faker->e164PhoneNumber,
            'work_email' => $faker->companyEmail,
            'secondary_email' => $faker->freeEmail,
            'is_in_phd_study' => $faker->boolean(10),
            'employment_ratio' => 100,
        ]);
    }
}
