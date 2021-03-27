<?php namespace Conka\Secretary\Updates;

use Conka\Secretary\Models\CompletationInterface;
use Conka\Secretary\Models\LanguageInterface;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('conka_secretary_subjects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('abbr');
            $table->string('title');
            $table->unsignedInteger('credits')->default(0);
            $table->string('department')->nullable();
            $table->unsignedBigInteger('garant_id')->nullable();
            $table->unsignedInteger('lecture_hours')->default(0);
            $table->unsignedInteger('seminar_hours')->default(0);
            $table->unsignedInteger('exercise_hours')->default(0);
            $table->unsignedInteger('weeks')->default(14);
            $table->enum('language', LanguageInterface::ALLOWED_LANGUAGES)->default(LanguageInterface::CS);
            $table->enum('completation', CompletationInterface::ALLOWED_VALUES)->default(CompletationInterface::EXAM);
            $table->integer('group_size')->default(24);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conka_secretary_subjects');
    }
}
