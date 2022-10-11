<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('color')->nullable();
            $table->string('number')->unique();
            $table->boolean('is_delete')->default(false)->nullable();
            $table->timestamps();
        });
        
        Schema::table('car', function (Blueprint $table) {
            $table->index('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car', function (Blueprint $table) {
            $table->dropIndex('car_number_index');
        });
        
        Schema::dropIfExists('car');
    }
};
