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
            $table->string('name');
            $table->double('price', 8,2);;
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->boolean('has_discount')->default(0);
            $table->double('discount_percentage', 8, 2)->default(0);
            $table->double('discounted_price', 8, 2)->default(0);
            $table->date('discount_start_date')->nullable()->default(null);
            $table->date('discount_end_date')->nullable()->default(null);
            $table->boolean('is_available')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->foreignId('product_category_id')->constrained('product_categories');
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
