<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('application_no');
            $table->string('phone_no');
            $table->string('email');
            $table->enum('form_fill',['0','1'])->default('0');
            $table->enum('verified',['0','1'])->default('0');
            $table->enum('file_created',['0','1'])->default('0');
            $table->enum('payment',['0','1'])->default('0');
            $table->enum('email_create',['0','1'])->default('0');
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
        Schema::dropIfExists('names');
    }
}
