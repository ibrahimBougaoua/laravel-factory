<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('email',150);
            $table->string('password',150);
            $table->string('gender',15);
            $table->string('phone',20);
            $table->string('city',20);
            $table->string('photo',200);
            $table->text('address');
            $table->boolean('status')->default(0);
            $table->boolean('trash')->default(0);
            $table->unsignedInteger('manage_id');
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
        Schema::dropIfExists('admins');
    }
}
