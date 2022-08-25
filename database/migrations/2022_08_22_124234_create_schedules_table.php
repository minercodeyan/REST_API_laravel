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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string("day");
            $table->foreignId('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
            $table->foreignId('period_id')
                ->references('id')
                ->on('periods')
                ->onDelete('cascade');
            $table->foreignId('subject_id')
                ->nullable()
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');
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
        Schema::dropIfExists('schedules');
    }
};
