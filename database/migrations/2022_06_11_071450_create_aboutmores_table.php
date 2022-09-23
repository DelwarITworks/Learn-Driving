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
        Schema::create('aboutmores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_id')->nullable();
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('detail')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('aboutmores');
    }
};
