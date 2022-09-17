<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shorts', function (Blueprint $table) {
            $table->id();
            $table->string('vid')->nullable();
            $table->string('title')->nullable();
            $table->text('thumbnails')->nullable()->default(json_encode([]));
            $table->text('description')->nullable();
            $table->string('channelTitle')->nullable();
            $table->string('channel')->nullable();
            $table->text('tags')->nullable()->default(json_encode([]));
            $table->string('defaultAudioLanguage')->nullable();
            $table->text('statistics')->nullable()->default(json_encode([]));
            $table->text('content_details')->nullable()->default(json_encode([]));
            $table->integer('downloaded')->nullable()->default(1);

            // extra data
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shorts');
    }
};
