<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booksits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ips');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('sitno');
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
        Schema::dropIfExists('booksits');
    }
}
