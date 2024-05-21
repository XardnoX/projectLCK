<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorie', function (Blueprint $table) {
            $table->id();
            $table->string('nazev');
            $table->text('popis')->nullable();
            $table->timestamps();
        });

        // Add foreign key to stranka table
        Schema::table('stranka', function (Blueprint $table) {
            $table->foreignId('kategorie_id')->constrained('kategorie')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stranka', function (Blueprint $table) {
            $table->dropForeign(['kategorie_id']);
            $table->dropColumn('kategorie_id');
        });

        Schema::dropIfExists('kategorie');
    }
}
