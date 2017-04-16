<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid', 40)->unique();
            $table->string('name');
            $table->string('email', 50);
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('cover')->nullable();
            $table->string('favorite_athletes')->nullable();
            $table->string('favorite_teams')->nullable();
            $table->timestamps();

            $table->index(['userid', 'email'], 'userid-email-idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
