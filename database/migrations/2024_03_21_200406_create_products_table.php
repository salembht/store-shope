<?php

use App\Models\Brand;
use App\Models\Cateogry;
use App\Models\User;
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
            $table->string('title',200);
            $table->string('sluge',400);
            $table->integer('quantity');
            $table->longText('descrption')->nullable();
            $table->boolean('published')->default(0);
            $table->boolean('inStock')->default(0);
            $table->decimal('price');
            $table->foreignIdfor(User::class,'created_by')->nullable();
            $table->foreignIdfor(User::class,'updated_by')->nullable();
            $table->foreignIdfor(User::class,'deleted_by')->nullable();
            $table->foreignIdfor(Brand::class,'brand_id')->nullable();
            $table->foreignIdfor(Cateogry::class ,'cateogry_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.for
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
