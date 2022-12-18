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
        Schema::create('mshlok_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mchapter_id')->nullable()->cascadeOnDelete();
            $table->foreignId('mshlok_id')->nullable()->cascadeOnDelete();
            $table->foreignId('language_id')->nullable()->cascadeOnDelete();
            $table->foreignId('author_id')->nullable()->cascadeOnDelete();
            $table->foreignId('chapter_name_id')->nullable()->cascadeOnDelete();
            $table->longText('details');
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
        Schema::dropIfExists('mshlok_details');
    }
};
