<?php


namespace Conka\Secretary\Updates;


use Conka\Secretary\Models\LanguageInterface;
use Conka\Secretary\Models\StudyGroup;
use Conka\Secretary\Models\StudyGroupFormInterface;
use Conka\Secretary\Models\StudyGroupTermInterface;
use Conka\Secretary\Models\StudyGroupTypeInterface;
use Conka\Secretary\Models\Subject;
use Faker\Factory;
use October\Rain\Database\Updates\Seeder;
use October\Rain\Support\Str;

class StudyGroupSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $abbr = Str::upper($faker->bothify('???'));

        $studyGroup = StudyGroup::create([
            'abbr' => $abbr,
            'title' => $faker->company,
            'form' => StudyGroupFormInterface::FULL_TIME,
            'term' => $faker->randomElement(StudyGroupTermInterface::ALLOWED_VALUES),
            'type' => $faker->randomElement(StudyGroupTypeInterface::ALLOWED_VALUES),
            'year' => 2021,
            'students_count' => $faker->numberBetween(12,36),
            'language' => $faker->randomElement(LanguageInterface::ALLOWED_LANGUAGES),
        ]);

        $studyGroup->subjects()->attach(Subject::all()->random(6)->pluck('id'));
    }
}
