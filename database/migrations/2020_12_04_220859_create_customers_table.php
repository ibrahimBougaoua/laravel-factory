<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',150);
            $table->string('last_name',150);
            $table->string('email',150);
            $table->string('password',150);
            $table->string('gender',15);
            $table->string('phone',20);
            $table->string('city',20);
            $table->string('photo',200)->nullable();
            $table->text('address');
            $table->text('credit_card',150)->nullable();
            $table->text('credit_card_type',150)->nullable();
            $table->text('billin_address')->nullable();
            $table->text('billin_city',150)->nullable();
            $table->text('billin_region',150)->nullable();
            $table->text('billin_postal_code',150)->nullable();
            $table->boolean('black_list')->default(0);
            $table->boolean('online')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('trash')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
