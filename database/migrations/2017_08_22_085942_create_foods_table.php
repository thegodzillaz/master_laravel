<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('materials_id')->nullable();
            $table->string('basic');
            $table->string('detail');
            $table->float('weight');
            $table->double('selling_price');
            $table->timestamps();
        });

        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('detail');
            $table->float('weight');
            $table->double('purchase_price');
            $table->timestamps();
        });

        Schema::table('basics',function(Blueprint $kolom){
            $kolom->foreign('materials_id')
            ->references('id')
            ->on('materials')
            ->onUpdate('cascade');
        });

        Schema::create('additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('detail');
            $table->float('weight');
            $table->double('purchase_price'); // harga beli
            $table->double('seeling_price'); // harga jual
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
        Schema::dropIfExists('basics');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('additionals');
    }
}
