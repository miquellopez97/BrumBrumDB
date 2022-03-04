<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApibbusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbusers', function (Blueprint $table) {
            $table->id();

            $table->string('username');
            $table->string('email');
            $table->string('name');
            $table->string('surname');
            $table->string('password');
            $table->string('rol');
            $table->string('detail');
            $table->string('otherInformation');
            $table->integer('photo');

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
        Schema::dropIfExists('bbusers');
    }
}
