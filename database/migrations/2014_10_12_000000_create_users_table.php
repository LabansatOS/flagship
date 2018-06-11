<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_admin')->default(false);
            $table->string('name');
            $table->string('last_name');
            $table->date('birthday')->default(Carbon::now());
            $table->string('nationality')->default('');
            $table->boolean('qualified_investor')->default(false);
            $table->string('email')->unique();
            $table->string('rfc')->unique()->default('');
            $table->string('street')->default('');
            $table->string('neighborhood')->default('');
            $table->string('city')->default('');
            $table->string('state')->default('');
            $table->string('zip_code')->default('');
            $table->string('id_image')->default('');
            $table->string('clabe')->default('');
            $table->boolean('clabe_approved')->default(false);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
