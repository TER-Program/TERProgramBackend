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
                                a pontszámot meghatározni.',
                'doc_required' => 1
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

        AspectItem::create([
            'aspect' => '2',
            'max_score' => 3,
            'name' => 'Éves tartalmi tervezés, napi
tervezés.
                    ',
            'description' => 'Az adott tanulócsoport jellemzőinek ismerete alapján a tanulócsoport és az egyes tanulók eltérő képességeire, szociokulturális
helyzetére figyelemmel készít tanmenetet, foglalkozási tervet. Óráira
felkészül, témavázlatot és/vagy óratervet készít, és ezek ütemezése
alapján halad a tanítással, óravezetése, napi szakmai tevékenysége
tervszerűen felépített. (Több tantárgy tanítása esetén több pont.)'
        ]);

        AspectItem::create([
            'aspect' => '2',
            'max_score' => 3,
            'name' => 'Többletfeladatok, különböző megbízások vállalása.
                    ',
            'description' => 'Osztályfőnök, munkaközösség-vezető, DÖK munkáját segítő
pedagógus, ÖTM tagja, eseti vagy állandó munkacsoport tagja,
pályázatfigyelő, pályázatíró, mentorálja a végzős hallgatókat/gyakornokot, mesterpedagógusként, kutatótanárként intézményfejlesztési
feladatokat vállal, támogatja az intézmény, a pedagógusok munkáját.
(Több megbízatás esetén több pont.)'
        ]);

        AspectItem::create([
            'aspect' => '2',
            'max_score' => 3,
            'name' => 'Az intézményen belüli szabadidős programok szervezése
                    ',
            'description' => 'Iskolai szabadidős programokat szervez és/vagy megvalósításában
aktívan részt vesz tanulói közösségével, azokat dokumentálja (forgatókönyv, beszámoló, elégedettségmérés/értékelés stb.). Az intézményi hagyományok ápolásában tevékenyen vesz részt.'
        ]);

        AspectItem::create([
            'aspect' => '2',
            'max_score' => 3,
            'name' => 'Az intézményen kívüli
programokban való részvétel (projektek, táborok,
tanulmányi utak, múzeumés színházlátogatás stb.)
                    ',
            'description' => 'Iskolán kívüli programokat kezdeményez, szervez, tájékoztatja
a tanulókat az iskolán kívüli programokról. Önálló feladatot vállal
a programok megvalósítása során, vagy a programok megvalósításában aktívan részt vesz.
'
        ]);

        AspectItem::create([
            'aspect' => '3',
            'max_score' => 2,
            'name' => 'A pedagógus szabályés normakövető magatartása
                    ',
            'description' => 'A pedagógus foglalkoztatással kapcsolatos irányadó ágazati jogszabályokban rá vonatkozó rendelkezéseket ismeri és követi, az SZMSZ
és Házirend szabályait, a munkaköri leírásában foglaltakat maradéktalanul betartja.
A tanügyi dokumentumokkal, vizsgákkal összefüggő adminisztrációs feladatokat – a feladatköréhez kapcsolódóan – szakszerűen,
pontosan, határidőre elvégzi.
'
        ]);

        AspectItem::create([
            'aspect' => '3',
            'max_score' => 3,
            'name' => 'Haladási napló vezetése
                    ',
            'description' => 'Az e-naplóban tantárgyához, foglalkozásaihoz kapcsolódóan naprakészen vezeti az előrehaladást, illetve a tanulók késését, hiányzását..
'
        ]);


        AspectItem::create([
            'aspect' => '3',
            'max_score' => 3,
            'name' => 'A tanulók értékelésével öszszefüggő adminisztrációs
tevékenység
                    ',
            'description' => 'Szóbeli, írásbeli és egyéb a tanuló által készített produktumokat folyamatosan, az intézményi belső szabályzókban meghatározott időtartamon belül értékeli, a tanulóknak megfelelő számú érdemjegyet,
értékelést ad/ szöveges értékelését az előírt módon vezeti.
'
        ]);

        AspectItem::create([
            'aspect' => '4',
            'max_score' => 3,
            'name' => 'Nevelőtestületi, szakmai
munkaközösségi tevékenységekben való részvétel,
együttműködés szakmai
partnerekkel
                    ',
            'description' => 'Konstruktív, építő jelleggel részt vesz a nevelőtestületi értekezleteken, hozzászólásokkal, pedagógiai jellegű előadások tartásával (pl.
nevelési értekezleten) segíti a testület munkáját. Aktívan közreműködik a szakmai munkaközössége éves programjainak tervezésében,
szervezésében, megvalósításában, értékelésében. Törekszik arra,
hogy naprakész információval rendelkezzen, az információk átadásában és fogadásában mindig szakszerű és objektív.
Munkavégzése során kezdeményezően együttműködik a pedagógustársaival, szakmai partnerekkel (pl. iskolapszichológus, pedagógiai szakszolgálat munkatársai, szociális segítő, iskolaorvos, családsegítő stb.)
Nyitottság, szakmai kihívások megoldásában való aktivitás jellemzi.

'
        ]);

        AspectItem::create([
            'aspect' => '4',
            'max_score' => 3,
            'name' => 'Kapcsolattartás és kommunikáció a szülőkkel/törvényes képviselőkkel
                    ',
            'description' => 'A szülői értekezleteket, fogadó órákat hiánytalanul megtartja. A szülőket/törvényes képviselőket igény szerint szakszerűen, közérthetően és objektíven tájékoztatja, velük a folyamatos együttműködésre
való törekvés jellemzi.
'
        ]);

        AspectItem::create([
            'aspect' => '6',
            'max_score' => 2,
            'name' => 'Motiváció, elkötelezettség
                    ',
            'description' => 'Szakmai tudását folyamatos megújítja, módszertani kultúráját fejleszti, beépíti a mindennapi pedagógiai gyakorlatba. Fontos számára
az erősségeinek és fejleszthető területeinek önértékeléssel történő
rendszeres meghatározása. Elkötelezett az intézmény küldetése, céljai és a pedagógiai program iránt, a megvalósításban kezdeményező
szerepet vállal.
'
        ]);

        AspectItem::create([
            'aspect' => '6',
            'max_score' => 2,
            'name' => 'A szervezet képviselete
                    ',
            'description' => 'Külső és belső fórumokon, programokon eredményesen képviseli
és menedzseli az intézmény érdekeit, öregbíti az intézmény jó hírnevét.
'
        ]);

        AspectItem::create([
            'aspect' => '6',
            'max_score' => 2,
            'name' => 'Etikus magatartás
                    ',
            'description' => 'A rá vonatkozó pedagógus etikai szabályok szerinti normákat követi, betartja
'
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
