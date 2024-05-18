<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzivatelTable extends Migration
{
    public function up()
    {
        Schema::create('uzivatel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('krestni_jmeno');
            $table->string('prijmeni');
            $table->string('prezdivka');
            $table->string('heslo');
            $table->timestamp('datum_registrace')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('uzivatel');
    }
}
