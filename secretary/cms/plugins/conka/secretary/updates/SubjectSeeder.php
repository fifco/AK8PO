<?php


namespace Conka\Secretary\Updates;


use Conka\Secretary\Models\CompletationInterface;
use Conka\Secretary\Models\Employee;
use Conka\Secretary\Models\LanguageInterface;
use Conka\Secretary\Models\Subject;
use Faker\Factory;
use October\Rain\Database\Updates\Seeder;
use October\Rain\Support\Str;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $title = Str::upper($faker->bothify('??'));

        $employee = Subject::create([
            'abbr' => $faker->bothify('AK#') . $title,
            'title' => $title,
            'credits' => $faker->numberBetween(1,5),
            'department' => $faker->company,
            'garant_id' => Employee::all()->random()->id,
            'lecture_hours' => $faker->numberBetween(1,4),
            'seminar_hours' => $faker->numberBetween(0,2),
            'exercise_hours' => $faker->numberBetween(0,2),
            'weeks' => 14,
            'language' => $faker->randomElement(LanguageInterface::ALLOWED_LANGUAGES),
            'completation' => $faker->randomElement(CompletationInterface::ALLOWED_VALUES),
            'group_size' => $faker->randomElement([12,24]),
        ]);
    }
}
