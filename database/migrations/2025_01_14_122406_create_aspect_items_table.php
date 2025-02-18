<?php

use App\Models\AspectItem;
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
        Schema::create('aspect_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aspect')->references('id')->on('aspects');
            $table->integer('max_score');
            $table->longText('name');
            $table->longText('description');
            $table->boolean('doc_required')->default(0);
            $table->timestamps();
        });
        AspectItem::create([
            'aspect' => '1',
            'max_score' => 8,
            'name' => 'A) A tanulói kompetenciamérési eredmények
                    alakulása (ha a tanulók a
                    kompetenciamérésben részt
                    vesznek)*
                    ',
            'description' => 'Az adott tanévi kompetencia mérési eredményeket az azt megelőző mérési eredményeihez képest kell vizsgálni, amelyek elérhetők
                            az OH intézményi gyorsvisszajelző felületén. Ha az értékelt pedagógus több, mérési eredménnyel is rendelkező tanulócsoportban tanít,
                            csoportonként kell a fejlődést értékelni és ezek együttese alapján kell
                                a pontszámot meghatározni.'
        ]);
        AspectItem::create([
            'aspect' => '1',
            'max_score' => 8,
            'name' => 'B) A kizárólag sajátos neve 16 -
                        lési igényű tanulókat nevelő-oktató iskolák esetében,
                        ha a tanulók a kompetenciamérésben nem vesznek
                        részt, az A) ponttól eltérően:
                        Egyéni és csoportos fejlesztési eredmények
                    ',
            'description' => 'B) Az egyéni és csoportszintű fejlesztés dokumentumai (fejlesztési
                                tervek, tanulói munkák, egyéni fejlődés értékelése) alapján kell meghatározni'
        ]);
        AspectItem::create([
            'aspect' => '1',
            'max_score' => 4,
            'name' => 'Intézményi statisztikák,
                        tanulóra kereshető adatok
                        változásainak iránya
                    ',
            'description' => 'A pedagógus által tanított tanulók/csoportok félévi, év végi tantárgyi statisztikái, lemorzsolódással veszélyeztetett jelzőrendszeri
mutatói alapján kell meghatározni, hogy ezek jók és/vagy javuló
tendenciát mutatnak, vagy csökkenő, vagy stagnáló értéket, és a továbbtanulási mutatók kedvezően alakulnak-e.
Az értékelésnél azt is figyelembe kell venni, hogy a tanulói eredményesség statisztikai mutatóira a pedagógustól független tényezők is
hatással lehetnek (pl. egészségi és/vagy pszichés állapot változása). '
        ]);

        AspectItem::create([
            'aspect' => '1',
            'max_score' => 6,
            'name' => 'Korszerű, innovatív pedagógiai módszerek, eszközök, tanulásszervezési
eljárások tanórai alkalmazása, a vonatkozó irányelvek
alkalmazása.
                    ',
            'description' => 'A pedagógus a tanóráin rendszeresen alkalmazza a digitális eszközöket és a digitális tananyagtartalmakat.
Élményalapú, interaktív munkaszervezési és értékelési módszereket
alkalmaz (pl. csoportmunka, projektfeladat, folyamatba ágyazott értékelés), fejleszti a mérlegelő gondolkodási készségeket, erősíti a tantárgyak, műveltségi területek közötti tantárgyközi kapcsolódásokat.
Egyénre szabottan és céltudatosan fejleszti a tanulók készségeit,
a sajátos nevelési igényű, illetve beilleszkedési, tanulási, magatartási
nehézséggel küzdő tanulók számára differenciált ellátást biztosít.'
        ]);

        AspectItem::create([
            'aspect' => '1',
            'max_score' => 2,
            'name' => 'Díjak, elismerések, kutatási
eredmények, publikációk,
mesterprogram, kutató tanári program megvalósítása
és ezek hasznosulása az iskola életében.
                    ',
            'description' => 'Rendelkezik a pedagógiai munkája eredményességét bizonyító,
az intézmény által alapított és/ vagy helyi, települési, tankerületi
vagy egyéb állami díjakkal, elismerésekkel. Mesterpedagógus és kutató tanári programjával, kutatási eredményeivel, publikációkkal
hozzájárul az intézményi, vagy tágabb értelemben (helyi, regionális,
országos szinten) a pedagógiai munka minőségének fejlesztéséhez.'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspect_items');
    }
};
