<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('country');
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('marital_status')->nullable();
            $table->longText('bio')->nullable();
            $table->string('image')->nullable();
            $table->boolean('enabled')->default(0);
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
        Schema::dropIfExists('members');
    }
}
