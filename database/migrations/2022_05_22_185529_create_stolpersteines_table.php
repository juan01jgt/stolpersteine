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
        Schema::create('stolpersteines', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('localidad');
            $table->date('f_nacimiento');
            $table->date('f_defuncion');
            $table->longText('biografia');
            $table->longText('Descripcion');
            $table->string('foto')->nullable();
            $table->decimal('lat', 18, 15);
            $table->decimal('lon', 18, 15);
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
        Schema::dropIfExists('stolpersteines');
    }
};
