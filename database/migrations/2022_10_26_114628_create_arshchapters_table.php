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
        Schema::create('arshchapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arshbook_id')->nullable()->cascadeOnDelete();
            $table->foreignId('author_id')->nullable()->cascadeOnDelete();
            $table->foreignId('language_id')->nullable()->nullOnDelete();
            $table->tinyInteger('chapter_no')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->date('published_at')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->tinyInteger('created_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('arshchapters');
    }
};
