<?php namespace Conka\Secretary\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class CreateStudyGroupSubjectTable extends Migration
{
    public function up()
    {
        Schema::create('conka_secretary_study_group_subject', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('study_group_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();

            $table->foreign('study_group_id', 'FK_sgs_study_groups')->references('id')->on('conka_secretary_study_groups');
            $table->foreign('subject_id', 'FK_sgs_subjects')->references('id')->on('conka_secretary_subjects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('conka_secretary_study_group_subject');
    }
}
