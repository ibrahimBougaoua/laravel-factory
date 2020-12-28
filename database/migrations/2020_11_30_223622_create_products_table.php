<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->text('description');
            $table->string('quantity_unit',200);
            $table->unsignedDecimal('unit_price', $precision = 8, $scale = 2);
            $table->string('size',150);
            $table->string('color',150);
            $table->text('note');
            $table->boolean('status')->default(0);
            $table->unsignedInteger('cateid');
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
        Schema::dropIfExists('products');
    }
}
