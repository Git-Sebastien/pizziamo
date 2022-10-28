<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->id();
            $table->string('pizza_name');
            $table->float('pizza_price');
            $table->longText('pizza_composition')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->foreignId('fk_category_id')
            ->constrained('category')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->dateTime('created_at')
            ->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
};
