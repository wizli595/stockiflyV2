<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->string("product_code");
            $table->float("buying_price");
            $table->float("selling_price");
            $table->integer("stock");
            $table->string("product_image");
            $table->foreignId("categorie_id")->constrained("categories");
            $table->foreignId("werhouse_id")->constrained("werhouses");
            $table->foreignId("brand_id")->constrained("brands");
            $table->foreignId("unite_id")->constrained("unites");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};