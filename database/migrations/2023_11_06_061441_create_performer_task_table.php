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
        Schema::create('performer_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->index()->constrained('tasks');
            $table->foreignId('performer_id')->index()->constrained('performers');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performer_tasks');
    }
};
