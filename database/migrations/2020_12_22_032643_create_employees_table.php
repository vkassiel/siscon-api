<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            
            // Personal data
            $table->id()->unsigned();
            $table->string('name')->nullable(false);
            $table->string('cpf');
            $table->date('birthDate');
            $table->string('nationality');
            $table->string('schooling');
            $table->string('profession');
            $table->string('gender');
            $table->string('status');
            $table->string('phone');
            $table->string('email');

            //Address
            $table->string('cep');
            $table->string('street');
            $table->string('number');
            $table->string('district');
            $table->string('country');
            $table->string('city');
            $table->string('complement');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
