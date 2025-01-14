<?php

use App\Models\Aspect;
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
        Schema::create('aspects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Aspect::create([
            'name' => 'Pedagógiai munka minősége, eredményessége'
        ]);
        Aspect::create([
            'name' => 'Feladatvállalás mennyiségi mutatói'
        ]);
        Aspect::create([
            'name' => 'Munkavégzés megbízhatósága, határidők betartása'
        ]);
        Aspect::create([
            'name' => 'Kommunikáció, együttműködés'
        ]);
        Aspect::create([
            'name' => 'Tehetséggondozás, felzárkóztatás/ esélyteremtés'
        ]);
        Aspect::create([
            'name' => 'Motiváció, elkötelezettség, etikus magatartás'
        ]);
        Aspect::create([
            'name' => ' Egyedi intézményi értékelési szempont'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspects');
    }
};
