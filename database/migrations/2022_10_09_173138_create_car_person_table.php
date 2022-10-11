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
        Schema::create('car_person', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->integer('person_id');
            $table->dateTime('expired_at')->nullable();
            $table->timestamps();
        });
        
        Schema::table('car_person', function (Blueprint $table) {
            $table->index('car_id');
            $table->index('person_id');
            $table->index('expired_at');
        });
        
        Schema::table('car_person', function (Blueprint $table) {
            $table->foreign('car_id')->references('id')->on('car');
            $table->foreign('person_id')->references('id')->on('person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_person', function (Blueprint $table) {
            $table->dropForeign('car_person_car_id_foreign');
            $table->dropForeign('car_person_person_id_foreign');
        });
        
        Schema::table('car_person', function (Blueprint $table) {
            $table->dropIndex('car_person_car_id_index');
            $table->dropIndex('car_person_person_id_index');
            $table->dropIndex('car_person_expired_at_index');
        });
        
        Schema::dropIfExists('car_person');
    }
};
