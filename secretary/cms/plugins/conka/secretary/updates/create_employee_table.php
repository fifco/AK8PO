<?php namespace Conka\Secretary\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('conka_secretary_employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('work_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->boolean('is_in_phd_study')->default(false);
            $table->integer('employment_ratio')->default(100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conka_secretary_employees');
    }
}
