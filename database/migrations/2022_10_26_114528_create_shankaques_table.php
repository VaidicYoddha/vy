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
        Schema::create('shankaques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_id')->nullable()->cascadeOnDelete();
            $table->foreignId('language_id')->nullable()->cascadeOnDelete();
            $table->string('samadhan_karta');
            $table->longText('shanka');
            $table->longText('samadhan');
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
        Schema::dropIfExists('shankaques');
    }
};
