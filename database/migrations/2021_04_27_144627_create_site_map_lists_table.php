<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteMapListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_map_lists', function (Blueprint $table) {
            $table->id();
            $table->string('host', 150)->nullable();
            $table->string('uri', 150)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('prefix', 150)->nullable();
            $table->string('action', 150)->nullable();
            $table->string('action_method', 150)->nullable();
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
        Schema::dropIfExists('site_map_lists');
    }
}
