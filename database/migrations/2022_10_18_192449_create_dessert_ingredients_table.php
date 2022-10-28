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
        Schema::create('dessert_ingredients', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->id();
            $table->string('dessert_ingredient_name');
            $table->foreignId('fk_dessert_id')
            ->constrained('desserts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dessert_ingredients');
    }
};
