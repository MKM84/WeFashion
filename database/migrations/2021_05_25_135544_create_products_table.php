<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description')->nullable(); // optional
            $table->decimal('price', 9, 2);
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL'])->default('M');
            $table->enum('visibility', ['published', 'unpublished'])->default('unpublished');
            $table->enum('status', ['sold', 'standard'])->default('standard');
            $table->string('reference', 16)->unique(); // uniqe reference
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
