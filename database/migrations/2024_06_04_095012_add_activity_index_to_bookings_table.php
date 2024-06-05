<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivityIndexToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_index')->nullable()->after('user_id');

            // Foreign key constraint
            $table->foreign('activity_index')->references('id')->on('activities')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['activity_index']);
            $table->dropColumn('activity_index');
        });
    }
}
