<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorieEditaceTable extends Migration
{
    public function up()
    {
        Schema::create('historie_editace', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stranka_id')->references('id')->on('stranka')->onDelete('cascade');
            $table->string('popis_editace');
            $table->timestamp('datum_editace');
            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('historie_editace');
    }
}
