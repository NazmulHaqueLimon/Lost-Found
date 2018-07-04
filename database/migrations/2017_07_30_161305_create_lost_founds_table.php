<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostFoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('lost_founds', function (Blueprint $table) {
            $table->increments('product_id')->unique();;
            $table->string('product_name');
            $table->string('catagory');
            $table->string('image');
            $table->string('description');
            $table->string('location');
            $table->string('status');
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
        Schema::dropIfExists('lost_founds');
    }
}
