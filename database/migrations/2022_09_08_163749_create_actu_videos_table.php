<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actu_videos', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->string("lien")-> nullable();
            $table->string("video")-> nullable();
            $table->string("poster")-> nullable();
            $table->unsignedBigInteger("video_type_id");
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
        Schema::dropIfExists('actu_videos');
    }
}
