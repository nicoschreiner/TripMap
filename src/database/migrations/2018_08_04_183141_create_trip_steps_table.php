<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trip_id');

            $table->string('name', 64);
            $table->string('description', 2048)->nullable();
            $table->date('beginn');
            $table->date('end');

            $table->decimal('lat', 11, 8);
            $table->decimal('lng', 11, 8);

            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('trip_id')
                  ->references('id')
                  ->on('trips')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_steps');
    }
}
