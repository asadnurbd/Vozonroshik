<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateRestaurentTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurent_tbs', function (Blueprint $table) {
       
            $table->id();
            $table->bigInteger('food_type_id')->unsigned();
            $table->foreign('food_type_id')->references('id')->on('food_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('rest_name');
            $table->string('rest_image');
            $table->string('rest_logo');
            $table->string('rest_description');
            $table->string('rest_address');
            $table->float('opening_time');
            $table->float('closing_time');
            $table->string('phone_number');
            $table->string('email');
            $table->string('fb_link');
            $table->string('google_link');
            $table->string('page_title');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->string('route_url')->unique();
            $table->boolean('delivery_status')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
        Schema::dropIfExists('restaurent_tbs');  
    }
}
