<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDisplayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list-display', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '30');
            $table->integer('price');
            $table->integer('user_id');
            $table->string('image', '100');
            $table->string('profile', '300');
            $table->date('date');
            $table->tinyInteger('del_flg')->default(0);
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
        Schema::dropIfExists('list-display');
    }
}
