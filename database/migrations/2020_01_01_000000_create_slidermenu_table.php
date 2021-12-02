<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id('slider_id')
                            ;
                            $table->string('slider_title' ,190)
                        ->nullable()
                ;
                $table->text('slider_desc')
                ->nullable()
                ;
                            $table->string('slider_image' ,190)
                        ->nullable()
                ;
                $table->boolean('slider_active')
                ->nullable()
                ;
    
            //$table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
