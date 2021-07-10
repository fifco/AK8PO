<?php namespace Conka\Secretary\Updates;

use Conka\Secretary\Models\WorkLabelTypeInterface;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class CreateWorkLabelsTable extends Migration
{
    public function up()
    {
        Schema::create('conka_secretary_work_labels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->enum('type', WorkLabelTypeInterface::ALLOWED_VALUES)->default(WorkLabelTypeInterface::LECTURE);
            $table->unsignedInteger('student_count');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('study_group_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->timestamps();

            $table->foreign('subject_id', 'FK_wl_subject')->on('conka_secretary_subjects')->references('id')->onDelete('SET NULL');
            $table->foreign('study_group_id', 'FK_wl_study_group')->on('conka_secretary_study_groups')->references('id')->onDelete('SET NULL');
            $table->foreign('employee_id', 'FK_wl_employee')->on('conka_secretary_employees')->references('id')->onDelete('SET NULL');
        });
    }

    public function down()
    {
        Schema::dropIfExists('conka_secretary_work_labels');
    }
}
