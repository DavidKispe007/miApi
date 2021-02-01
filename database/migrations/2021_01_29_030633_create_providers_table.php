<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('web')->nullable();
            $table->string('address')->nullable();
            $table->string('business_hours')->nullable();
            $table->enum('delivery', [1,2])->default(1);

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('distributor_id');
            $table->unsignedBigInteger('district_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('distributor_id')->references('id')->on('distribuitors')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. 'phone' => 'required|string|min:8|max:11'
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
