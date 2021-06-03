<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('language_id')->default(1)->index();
            $table->unsignedSmallInteger('group_id')->default(1);
            $table->string('name', 100);
            $table->string('route_name', 100)->nullable();
            $table->string('external_link', 200)->nullable();
            $table->integer('order')->default(10)->comment('recommended: increment by 10+');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_disabled')->default(false);
            $table->timestamps();
            $table->softDeletes();
//            $table->foreignId('language_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
