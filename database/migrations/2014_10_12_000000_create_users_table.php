<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('username')->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('gender')->default(0);
            $table->string('avatar')->default('default.png');
            $table->tinyInteger('is_admin')->default(false);
            $table->enum('status', ['0','1','2', '3'])->default(0)->comment('0 pending, 1 active, 2 blocked, 3 suspend');
            $table->string('confirmation_code', 64)->unique()->nullable();
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
