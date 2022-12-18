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
        Schema::create('mchapter_names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->nullable()->cascadeOnDelete();
            $table->integer('chapter_no');
            $table->tinyText('name');
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
        Schema::dropIfExists('mchapter_names');
    }
};
