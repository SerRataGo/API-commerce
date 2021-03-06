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
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id');

            $table->string('product_name_en');


            /*
            $table->integer('sub_sub_category_id')->nullable();
            $table->string('product_name_en');
            $table->string('product_name_es');
            $table->string('product_slug_en')->nullable();
            $table->string('product_slug_es')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_tags_en')->nullable();
            $table->string('product_tags_es')->nullable();
            $table->string('product_size_en')->nullable();
            $table->string('product_size_es')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_es')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_en')->nullable();
            $table->string('short_description_es')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_es')->nullable();
            $table->string('product_name_en');
            $table->string('product_name_ar');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_ar');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_ar')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_ar');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_en');
            $table->string('short_description_ar');
            $table->string('description_en');
            $table->string('description_ar');


            */

            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('digital_file')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(0);

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
