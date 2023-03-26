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
        Schema::create('zapatos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo', 20);
            $table->string('marca', 20);
            $table->string('color', 30);
            $table->decimal('talla', 8,2);
            $table->decimal('precio', 8,2);
            $table->decimal('stock', 8, 2);
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
        Schema::dropIfExists('zapatos');
    }
};
