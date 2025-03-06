<?php

use App\Models\PerformanceGoal;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('performance_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher')->references('id')->on('users');
            $table->unsignedBigInteger('evaluator')->nullable();
            $table->foreignId('aspect_item')->references('id')->on('aspect_items');
            $table->integer('score')->default(0);
            $table->date('scored')->nullable();
            $table->timestamps();
            $table->foreign('evaluator')->references('id')->on('users');
        });



        // PerformanceGoal::create([
        //     'teacher'=>'1',
        //     'aspect_item'=>'1',
        // ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_goals');
    }
};
