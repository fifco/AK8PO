<?php namespace Conka\Secretary\Updates;

use Conka\Secretary\Models\LanguageInterface;
use Conka\Secretary\Models\StudyGroupFormInterface;
use Conka\Secretary\Models\StudyGroupTermInterface;
use Conka\Secretary\Models\StudyGroupTypeInterface;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class CreateStudyGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('conka_secretary_study_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('abbr');
            $table->string('title');
            $table->enum('form', StudyGroupFormInterface::ALLOWED_VALUES)->default(StudyGroupFormInterface::FULL_TIME);
            $table->enum('term', StudyGroupTermInterface::ALLOWED_VALUES)->default(StudyGroupTermInterface::SPRING);
            $table->enum('type', StudyGroupTypeInterface::ALLOWED_VALUES)->default(StudyGroupTypeInterface::MASTER);
            $table->year('year');
            $table->integer('students_count')->default(0);
            $table->enum('language', LanguageInterface::ALLOWED_LANGUAGES)->default(LanguageInterface::CS);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conka_secretary_study_groups');
    }
}
