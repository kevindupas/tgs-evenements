<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo');
            $table->string('image_date');
            $table->string('event_date');
            $table->string('ticket_link');
            $table->text('about_us');
            $table->text('practical_info');
            $table->string('park_address');
            $table->string('park_link');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('instagram_link');
            $table->string('youtube_link');
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
        Schema::dropIfExists('salons');
    }
}
