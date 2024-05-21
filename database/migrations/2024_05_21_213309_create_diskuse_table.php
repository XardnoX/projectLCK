<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskuseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskuse', function (Blueprint $table) {
            $table->id();
            $table->text('obsah');
            $table->timestamp('datum');
            $table->foreignId('stranka_id')->constrained('stranka')->onDelete('cascade');
            $table->foreignId('uzivatel_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('diskuse');
    }
}
