<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['start_time', 'end_time']);
            $table->dropTimestamps();
            $table->date('date')->after('description');
            $table->time('time')->after('date');
            $table->string('image')->after('time');
        });
    }

    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
            $table->dropColumn(['date', 'time', 'image']);
        });
    }
}
