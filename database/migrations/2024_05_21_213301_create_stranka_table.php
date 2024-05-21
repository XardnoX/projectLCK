<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrankaTable extends Migration
{
    public function up()
    {
        Schema::create('stranka', function (Blueprint $table) {
            $table->id();
            $table->string('nazev');
            $table->unsignedBigInteger('obrazek_id')->nullable();
            $table->timestamp('datum_vytvoreni')->useCurrent();
            $table->integer('verze')->default(1);
            $table->unsignedBigInteger('kategorie_id'); // Ensure this column is present
            $table->timestamps();

            $table->foreign('kategorie_id')->references('id')->on('kategorie')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stranka');
    }
}


