<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable();
            $table->string('title');
            $table->longText('note')->nullable();
            $table->enum('status', []); // TODO: need to fill enum
            $table->timestamp('duration_tmp_start')->nullable();
            $table->boolean('is_running')->default(false);
            $table->integer('duration');
            $table->integer('estimated_duration')->nullable();
            $table->date('schedule_start')->nullable();
            $table->date('schedule_end')->nullable();
            $table->string('category')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
