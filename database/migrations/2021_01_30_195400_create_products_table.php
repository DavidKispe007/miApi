<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Carbon;

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

            $table->string('name');
            $table->string('brand');
            $table->string('expiration_date')->nullable();
            $table->string('image');
            $table->integer('stock');
            $table->double('price_purchase', 8, 2);
            $table->double('price_sale', 8, 2);
            $table->string('health_register');
            $table->string('lot');
            $table->text('description');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('presentation_id');
            $table->unsignedBigInteger('ubication_id');
            $table->unsignedBigInteger('provider_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('presentation_id')->references('id')->on('presentations')->onDelete('cascade');
            $table->foreign('ubication_id')->references('id')->on('ubications')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            
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
