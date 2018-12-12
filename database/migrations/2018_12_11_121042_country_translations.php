<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountryTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Here i have data that won't be translated,
         * like: [id, code, ...]. 
         */
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->timestamps();
        });

        /**
         * but here, i Have the data that i want to Translate.
         * 
         * Here is the Game.
         */
        Schema::create('country_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['country_id', 'locale']);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
