<?php namespace Conka\Secretary\Updates;

use Conka\Secretary\Models\LanguageInterface;
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
            $table->enum('form', ['full-time', 'part-time'])->default('full-time');
            $table->enum('term', ['spring', 'autumn'])->default('spring');
            $table->enum('type', ['bachelor', 'master'])->default('master');
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
