<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the Migrations.
     * @return void 
     */
    public function up()
    {
        Schema::create(
            'bookings',
            function (Blueprint $table) {
                $table->id();

                $table->foreignId('user_id')->constrained()->onDelete('cascade');

                $table->foreignId('activity_id')->constrained()->onDelete('cascade');

                $table->timestamps();
            }
        );
    }
    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
