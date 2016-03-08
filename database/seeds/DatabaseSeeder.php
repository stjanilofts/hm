<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Notendur
        \App\User::create([
            'name' => 'Netvistun',
            'email' => 'vinna@netvistun.is',
            'password' => bcrypt(env('NETVISTUN')),
            'remember_token' => str_random(10),
        ]);

        function makePage($page = []) {
            if(!isset($page['slug'])) {
                $page['slug'] = str_slug($page['title']);
            }

            return factory(\App\Page::class)->create($page);
        }

        $um_okkur = makePage([
            'title' => 'Um okkur',
            'content' => '
<p>Eitt af meginmarkmiðum Hjartamiðstöðvarinnar er að bjóða einstaklingum með hjarta-og æðasjúkdóma upp á greiðan aðgang að þjónustu fagaðila. Við viljum efla forvarnir og  draga úr vægi hjarta-og æðasjúkdóma í samfélaginu. Við leggjum því ríka áherslu á að liðsinna einstaklingum sem glíma við áhættuþætti hjarta- og æðasjúkdóma svo sem ættarsögu, reykingar, háa blóðfitu eða háan blóðþrýsting.  Góð andleg og líkamleg heilsa er forsenda lífshamingju og árangurs í lífinu. Í því samhengi eru veraldleg gæði aukaatriði.</p>

<p>Hjarta-og æðasjúkdómar eru algengasta dánarsorsök Íslendinga og annarra vestrænna þjóða. Þeir eru einnig algengasta orsök skyndidauða meðal fólks á öllum aldri. Þá er algengt að hjarta-og æðasjúkdómar  skerði  lífsgæði fólks og valdi ótímabærri örorku. </p>

<p>Miklar framfarir hafa orðið í greiningu og meðferð hjarta-og æðasjúkdóma á síðustu tveimur til þremur áratugum. Dauðsföllum hefur fækkað og einstaklingar með hjartasjúkdóma lifa lengur en áður með sinn sjúkdóm.</p>

<p>Í baráttunni við hjartasjúkdóma og afleiðingar þeirra er mikilvægt að greiður aðgangur sé að fyrsta flokks sérfræðiþjónustu utan spítala. Lykilatriði er að slík þjónusta sé þverfagleg og til þess fallin að sinna einstaklingnum sjálfum og áhrifum hjartasjúkdóma á andlega og líkamlega líðan, lífsgæði, fjölskyldutengsl og vinnufærni.</p>

<p>Við greiningu hjartasjúkdóma er nauðsynlegt að til staðar sé sérfræðiþekking, tækni og tækjakostur sem gerir kleift að greina helstu hjarta-og æðasjúkdóma fljótt og örugglega. Meðferð sjúkdómanna sjálfra samanstendur oftast af lyfjameðferð og inngripum af ýmsu tagi eins og kransæðavíkkun, gangráðsísetningu eða jafnvel opinni hjartaskurðaðgerð. Lyfjameðferð við hjartasjúkdómum er oft umfangsmikil.</p>

<p>Mikilvægt er að einstaklingar með hjarta-og æðsjúkdóma fái viðeigandi fræðslu og upplýsingar til þess að þeir öðlist skilning á vandamáli sínu, sjúkdómum þeim sem um ræðir og tilgangi meðferðar. Upplýsingagjöf og greiður aðgangur að fræðsluefni og fagaðilum sem veitt geta upplýsingar er því mikilvægur hlekkur í meðferð sjúklinga með hjartasjúkdóma. </p>

<p>Forvarnir gegna lykilhlutverki í meðferð hjarta –og æðasjúkdóma. Kenna þarf heilbrigðum einstaklingum að tileinka sér lífsmáta sem dregur úr líkum á hjarta-og æðasjúkdómum síðar á ævinni. Fræða þarf ungt fólk um þá þætti sem líklegir eru til þess að valda skaða svo sem reykingar, hár blóðþrýstingur og há blóðfita. Ekki er síður mikilvægt að fræða hjartasjúklinga um lífsmáta og aðgerðir sem þeir geta  beitt sjálfir til þess að draga úr líkum á frekari hjartaáföllum eða versnun hjartasjúkdómsins.  Í þessu tilliti er mikilvægt að hætta alfarið reykingum, stunda reglulega hreyfingu og heilbrigt mataræði.</p>
            '
        ]);


        makePage([
            'title' => 'Hvað gerum við',
            'parent_id' => $um_okkur->id,
            'content' => '
<p>Hjartamiðstöðin sinnir greiningu, eftirliti og meðferð hjartasjúkdóma og helstu áhættuþátta þeirra. Meginmarkmiðið er að veita einstaklingum sem þangað leita greiðan aðgang að fyrsta flokks sérfræðiþjónustu.</p>

<p>Í dag er ekki gildandi samningur milli sjálfstætt starfandi sérfræðinga og Sjúkratrygginga íslands. Greiðsluþátttaka sjúkratrygginga er þó óbreytt frá því sem var þegar slíkur samningur var í gildi. Hjartmiðstöðin innheimtir því einungis hluta sjúklings eins og áður. Því þurfa sjúklingar ekki að sækja endurgreiðlsu sjálfir til sjúkratrygginga.</p>

<p>Vegna leiðréttinga á gjaldskrá sérfræðinga, sem gerðar hafa verið eftir að samningur rann úr gildi, er innheimt svokallað viðbótargjald.</p>

<p>Í Hjartamiðstöðinni starfa auk hjartalækna, hjúkrunarfræðingar, sjúkraliði og sálfræðingur. Rík áhersla er lögð á forvarnir, fræðslu og gott upplýsingaflæði til sjúklinga.</p>

<p>Í Hjartamiðstöðinni eru framkvæmdar algengustu rannsóknir sem notaðar eru við greiningu hjartasjúkdóma svo sem hjartalínurit, óm- og dopplerskoðun af hjarta, áreynsluhjartaritun og hjartasírit (Holter).</p>

<p>Í Hjartamiðstöðinnni eru einnig stundaðar vísindarannsóknir á sviði hjartasjúkdóma. Dæmi um rannsóknir sem gerðar hafa verið i Hjartmiðstöðinni er rannsókn á gagnsemi skimunar á áhættuþáttum fyrir skyndidauða meðal ungra íþróttamanna. Þá hefur Hjartamiðstöðin tekið þátt í alþjóðlegum rannsóknum á lyfjameðferð háþrýstings og lyfjameðferð við hjartaöng. Um þessar mundir tekur Hjartamiðstöðin þátt í alþjóðlegri rannsókn á lyjfameðferð langvinnrar hjartabilunar.</p>
            '
        ]);

        makePage([
            'title' => 'Markmið',
            'parent_id' => $um_okkur->id,
            'content' => '
<strong>Markmið Hjartamiðstöðvarinnar eru</strong>
<ol>
<li>Að veita einstaklingum með hjartasjúkdóma, einkenni eða áhættuþætti þeirra, greiðan aðgang að heilbrigðisþjónustu</li>
<li>Að framkvæma hratt og örugglega þær rannsóknir sem gera þarf í hverju tilviki svo sem hjartalínurit, hjartaálagspróf, hjartaómskoðun og sólarhringsskráningu á hjartslætti.</li>
<li>Að tryggja að einstaklingar með hjartasjúkdóma, einkenni eða áhættuþætti þeirra, fái bestu mögulega greiningu og meðferð sem völ er á hverju sinni. </li>
<li>Að greiningaraðferðir og meðferð séu í samræmi við gildandi klínískar leiðbeiningar.</li>
<li>Að þjónustan sé þverfagleg og til þess fallin að sinna líkamlegum, andlegum og félagslegum þáttum sjúkdómsástandsins.</li>
<li>Að upplýsingagjöf til sjúklinga sé sinnt af alúð og nákvæmni, og sjúklingar fái eins fljótt og unnt er upplýsingar um rannsóknarniðurstöður og þýðingu þeirra.</li>
<li>Að leggja ríka áherslu á forvarnir og aðgerðir til þess að draga úr hættu á hjarta- og æðasjúkdómum í samfélaginu.</li>
</ol>
            '
        ]);







































        makePage([
            'title' => 'Sjúkratryggingar',
            'content' => '
<p><strong>Greiðluþátttaka sjúkratrygginga</strong></p>

<p>Í dag er ekki gildandi samningur milli sjálfstætt starfandi sérfræðinga og Sjúkratrygginga Íslands. Greiðsluþátttaka sjúkratrygginga er þó óbreytt frá því sem var þegar slíkur samningur var í gildi. Hjartamiðstöðin innheimtir hluta sjúklings í samræmi við þennan samning. Því þurfa sjúklingar ekki að sækja endurgreiðlsu sjálfir til sjúkratrygginga. Vegna leiðréttinga á gjaldskrá sérfræðinga, sem gerðar hafa verið eftir að samningur rann úr gildi, er innheimt svokallað viðbótargjald.</p>

<p>Sjúkratryggingar/sérfræðilæknar</p>
            '
        ]);



        makePage([
            'title' => 'Rannsókn eftir hjartaáfall',
            'content' => '
<p>Óskað er eftir sjalfboðaliðum, einstaklingum sem fengið hafa hjartaáfall (kransæðastíflu), til þátttöku í klínískri lyfjarannsókn á fyrirbyggjandi meðferð gegn hjarta- og æðaáföllum.</p>

<p>Megintilgangur rannsóknarinnar er að meta hvort rannsóknarlyfið canakinumab hafi betri verkun en lyfleysa til að draga úr hjarta- og æðatengdum áföllum, eða nýmyndun á sykursýki af tegund 2, hjá sjúklingum sem hafa fengið kransæðastíflu, eru í stöðugu ástandi en með hækkað hsCRP.</p>

<p>Aðalrannsakendur eru Axel F. Sigurðsson, Karl K. Andersen og Torfi F. Jónasson, allir sérfræðingar í lyf- og hjartalækningum. Rannsóknin verður framkvæmd á eftirfarandi stöðum:</p>

<ul>
<li>Hjartamiðstöðinni, Holtasmára 1, 201 Kópavogi</li>
<li>Landspítala háskólasjúkrahúsi við Hringbraut, 101 Reykjavík</li>
<li>Læknasetrinu Þönglabakka 1 og 6, 109 Reykjavík </li>
</ul>

<p>Um 17.200 einstaklingar munu taka þátt í rannsókninni víðs vegar um heiminn, þar af allt að 300 hér á landi. Þátttaka varir að hámarki í 6 ár.</p>

<h3>Hvað felur rannsóknin í sér?</h3>
<p>Rannsóknin er slembiröðuð samanburðarrannsókn við lyfleysu. Það þýðir að þátttakendur fá annað hvort rannsóknarlyfið canakinumab eða lyfleysu. Lyfleysa er notuð í klínískum rannsóknum til að koma í veg fyrir að tilviljun eða væntingar hafi áhrif á niðurstöður. Líkurnar á að þátttakandi fái rannsóknarlyfið eru 3 af 4 og líkurnar á að fá lyfleysu eru 1 af 4.</p>

<p>Áhætta af þátttöku felst í mögulegum aukaverkunum af notkun rannsóknarlyfsins, bæði þekktum og ófyrirséðum. Ekki er hægt að tryggja að þátttakendur fái langvarandi bata af meðferð með rannsóknarlyfinu. </p>

<p>Ekki verður greitt fyrir þátttöku en læknisskoðun, rannsóknir og eftirlit verður þátttakendum að kostnaðarlausu. </p>

<p>Ef þú hefur áhuga á að taka þátt, vinsamlegast hafðu samband við hjúkrunarfræðinga rannsóknarinnar í Hjartamiðstöðinni, í síma 550 3040</p>

<p>Tekið skal fram að þeir sem svara auglýsingunni hafa ekki skuldbundið sig til að taka þátt í rannsókninni. Taki þeir þátt, geta þeir dregið sig út úr rannsókninni, án þess að gefa sérstaka ástæðu fyrir ákvörðun sinni.</p>

<p>Rannsóknin hefur fengið leyfi Vísindasiðanefndar, Persónuverndar og Lyfjastofnunar.</p>

<p>Frekari upplýsingar milli kl. 8.30 og 16.00 í síma 550 3040</p>
            ']
        );









        $rannsoknir = makePage([
            'title' => 'Rannsóknir',
            'content' => '
<p>Ýmsar rannsóknir eru notaðar við greiningu hjarta- og æðasjúkdóma. Miklar tæknilegar framfarir hafa átt sér stað á síðustu árum og margar rannsóknir eru nú einfaldari í framkvæmd og aðgengilegri en áður var. Þetta á ekki síst við um myndgreiningartækni af ýmsu tagi. Þrátt fyrir þetta eru sjúkrasaga og skoðun læknis enn lykilatriði við mat á einstaklingum með einkenni hjarta-og æðasjúkdóma.</p>

<p>Hér til vinstri eru upplýsingar um algengustu rannsóknir sem framkvæmdar eru í Hjartamiðstöðinni.</p>
            ',
            'images' => [
                [
                    'name' => 'rannsoknir1.jpg',
                    'title' => 'rannsoknir1.jpg',
                ],
                [
                    'name' => 'rannsoknir2.jpg',
                    'title' => 'rannsoknir2.jpg',
                ],
                [
                    'name' => 'rannsoknir3.jpg',
                    'title' => 'rannsoknir3.jpg',
                ],
                [
                    'name' => 'rannsoknir4.jpg',
                    'title' => 'rannsoknir4.jpg',
                ],
            ]
        ]);
            makePage([
                    'title' => 'Hjartalínurit',
                    'parent_id' => $rannsoknir->id,
                    'content' => '
        <p>Rannsóknin skráir rafvirkni hjartans á kerfisbundinn hátt.  Lítlar límelektróður eru settar á ákveðna staði á brjóstkassa svo og á útlimi.  Leiðslur frá hjartalínuritstækinu eru síðan tengdar við límelektróðurnar.  Hjartalínurit er prentað út.  Rannsóknin gefur upplýsingar um rafleiðni hjartans sem er mikilvægur hlekkur í starfsemi hjartans.   Með hjartalínuriti er t.d. unnt að greina hjartsláttartruflanir, merki um bráða eða gamla kransæðastíflu, merki um óeðlilega þykknun á hjartavöðva og ýmislegt fleira.</p>
                    ',
                    'images' => [
                        [
                            'name' => 'hjartalinurit1.jpg',
                            'title' => 'hjartalinurit1.jpg',
                        ],
                        [
                            'name' => 'hjartalinurit2.jpg',
                            'title' => 'hjartalinurit2.jpg',
                        ],
                    ]
            ]);
            makePage([
                    'title' => 'Hjartaálagspróf',
                    'parent_id' => $rannsoknir->id,
                    'content' => '
        <p>Við hjartaálagspróf (oft líka nefnt þolpróf eða áreynslupróf) er tekið hjartalínurit í hvíld og við áreynslu.  Einstaklingurinn er látinn erfiða á áreynsluhjóli og er tengdur við sérstakt línuritstæki meðan á áreynslu stendur svo og í hvíldarfasanum eftir áreynslu.  Blóðþrýstingur er mældur endurtekið meðan á áreynslu stendur.</p>

<p>Rannsóknin gefur upplýsingar um hvernig hjartað starfar undir álagi. Einnig fást upplýsingar um blóðþrýsting og lungnastarfsemi. Ákveðnar breytingar í hjartalínuriti við álag geta bent til þess að blóðrennsli sé skert í kransæðum.  Algengast er að hjartaálagspróf sé gert til þess að athuga hvort merki eru um kransæðasjúkdóm.  Ef slík merki koma fram er oft mælt með kransæðamyndatöku (þræðingu).</p>
<p>Alls tekur rannsóknin venjulega 30-45 mínútur. Æskilegt er að hafa með sér góða skó til þess að geta hjólað og æskilegt er að borða ekki mikið rétt fyrir prófið.</p>
                    ',
                    'images' => [
                        [
                            'name' => 'hjartaalagsprof1.jpg',
                            'title' => 'hjartaalagsprof1.jpg',
                        ],
                        [
                            'name' => 'hjartaalagsprof2.jpg',
                            'title' => 'hjartaalagsprof2.jpg',
                        ],
                    ]
            ]);
            makePage([
                    'title' => 'Hjartaómskoðun',
                    'parent_id' => $rannsoknir->id,
                    'content' => '
        <p>Við hjartaómskoðun eru hljóðbylgjur notaðar til þess að rannsaka hjartað. Þetta er sama aðferð og er notuð til þess að skoða fóstur hjá barnshafandi konum.  Hljóðbylgjurnar koma frá sendi (transducer)sem settur er á ákveðin svæði á brjóstkassa einstaklingsins. Hljóðbylgjurnar endurkastast síðan frá hinum ýmsu hlutum hjartans. Úr þessu verður hreyfanleg mynd sem hægt er að sjá á sérstökum skjá meðan á rannsókninni stendur. Upplýsingarnar er unnt að geyma á tölvutæku formi.</p>

<p>Hægt er að gera nákvæmar mælingar á stærð hjartahólfa, þykkt hjartavöðvans og samdráttargetu hans. Hægt er að skoða hjartalokur og hreyfingu þeirra.  Dopplertækni er notuð til þess að rannsaka blóðstreymi og blóðrennslishraða. Með þessari tækni er unnt að rannsaka leka og þrengsli í hjartalokum og meta blóðrennsli í mismunandi hlutum hjartans.</p>
<p>Algengar spurningar sem reynt er að svara við hjartaómskoðun eru eftirfarandi: Hversu góð er dælugeta hjartans? Eru merki um skemmd í hjartavöðva, t.d. vegna kransæðastíflu? Er leki eða þrengsl í hjartalokum? Hvaða þýðingu hefur slíkur leki eða þrengsl fyrir starfsemi hjartans? Er hjartavöðvinn eðlilega þykkur eða of þykkur? Eru til staðar merki um háþýsting í lungnablóðrás (lungnaháþrýstingur)?</p>
<p>Hjartaómskoðun er tiltölulega einföld rannsókn sem hefur þá kosti að hún er skaðlaus, óþægindalítil og gefur miklar upplýsngar á stuttum tíma. Rannsóknin tekur venjulega 20-45 mínútur.</p>
                    ',
                    'images' => [
                        [
                            'name' => 'hos1.jpg',
                            'title' => 'hos1.jpg',
                        ],
                        [
                            'name' => 'hos2.jpg',
                            'title' => 'hos2.jpg',
                        ],
                    ]
            ]);
            makePage([
                    'title' => 'Hjartasírit',
                    'parent_id' => $rannsoknir->id,
                    'content' => '
                <h3>Sólarhringsskráning á hjartslætti (hjartasírit/Holter)</h3>

        <p>Við þessa rannsókn eru litlar límelektróður settar á brjóstkassa. Eletróðurnar tengjast með grönnum vírum við lítið skráningartæki sem einstaklingurinn hefur á sér í sólarhring. Tækið er svo fjarlægt sólarhring eftir að það er sett á.  Skráningin er keyrð í gegnum sérstakt tölvuforrit og les læknir úr niðurstöðunum. Rannsóknin er notuð til þess að greina eða fastsetja ýmis konar hjartsláttartruflanir. Reikna má með að 20 mínútur taki að setja tækið á og svipaðan tíma að fjarlægja það.</p>

<p>Hægt er að gera nákvæmar mælingar á stærð hjartahólfa, þykkt hjartavöðvans og samdráttargetu hans. Hægt er að skoða hjartalokur og hreyfingu þeirra.  Dopplertækni er notuð til þess að rannsaka blóðstreymi og blóðrennslishraða. Með þessari tækni er unnt að rannsaka leka og þrengsli í hjartalokum og meta blóðrennsli í mismunandi hlutum hjartans.</p>
<p>Algengar spurningar sem reynt er að svara við hjartaómskoðun eru eftirfarandi: Hversu góð er dælugeta hjartans? Eru merki um skemmd í hjartavöðva, t.d. vegna kransæðastíflu? Er leki eða þrengsl í hjartalokum? Hvaða þýðingu hefur slíkur leki eða þrengsl fyrir starfsemi hjartans? Er hjartavöðvinn eðlilega þykkur eða of þykkur? Eru til staðar merki um háþýsting í lungnablóðrás (lungnaháþrýstingur)?</p>
<p>Hjartaómskoðun er tiltölulega einföld rannsókn sem hefur þá kosti að hún er skaðlaus, óþægindalítil og gefur miklar upplýsngar á stuttum tíma. Rannsóknin tekur venjulega 20-45 mínútur.</p>
                    ',
                    'images' => [
                        [
                            'name' => 'hsr1.jpg',
                            'title' => 'hsr1.jpg',
                        ],
                        [
                            'name' => 'hsr2.jpg',
                            'title' => 'hsr2.jpg',
                        ],
                    ]
            ]);








































        $hjartasjukdomar = makePage([
            'title' => 'Hjartasjúkdómar',
            'content' => '
<p>Hér má sjá fróðleik um hjartað, helstu flokka hjarta-og æðasjúkdóma og áhættuþætti þeirra.</p>
            ',
            'images' => [
                [
                    'name' => 'hjartasjuk1.jpg',
                    'title' => 'hjartasjuk1.jpg',
                ],
            ]
        ]);
            makePage([
                'title' => 'Mataræði',
                'parent_id' => $hjartasjukdomar->id,
                'content' => '
        <p>Ýtarlegar upplýsingar um mataræði má finna á þessum vefsíðum:</p>
        <ul>
        <li><a href="http://mataraedi.is/">http://mataraedi.is/</a></li>
        <li><a href="http://www.docsopinion.com/">http://www.docsopinion.com/</a></li>
        </ul>'
            ]);
            makePage([
                'title' => 'Heilbrigði hjartans',
                'parent_id' => $hjartasjukdomar->id,
                'content' => '
<p>Hvert mannsbarn sem fætt er á nýju árþúsundi hefur rétt til þess að lifa til að minnsta kosti 65 ára aldurs án þess að fá hjarta- og æðasjúkdóm sem hægt er að koma í veg fyrir. Þetta kemur fram í evrópsku stefnuskránni um heilbrigði hjartans.</p>

<p>Evrópska stefnuskráin um heilbrigði hjartans var sett saman til að vekja athygli á og mæta hratt vaxandi vandamálum tengdum hjarta-og æðasjúkdómum sem eru algengasta dánarorsök í Evrópu og valda nær helmingi dauðsfalla. Kostnaður vegna hjarta-og æðasjúkdóma innan Evrópu er tæplega 17 þúsund milljarðar íslenskra króna á ári. Það er því mjög brýnt að taka höndum saman og koma í veg fyrir ótímabær dauðsföll, örorku og skert lífsgæði vegna þessa vágests.</p>

<p>Evrópska stefnuskráin um heilbrigði hjartans er árangur náinnar og langvinnar samvinnu Evrópusamtaka Hjartaverndarfélaga (European Heart Network) og Evrópska hjartasjúkdómafélagsins (European Society of Cardiology) með stuðningi Evrópusambandsins (ESB) og Evrópusvæðis Alþjóðaheilbrigðisstofnunarinnar (WHO). Hjartavernd og Hjartasjúkdómafélag íslenskra lækna eru af Íslands hálfu aðilar að stefnuskránni og munu vinna sameiginlega að því að fylgja markmiðum hennar í samráði við íslensk heilbrigðisyfirvöld.</p>

<p>Með stefnuskránni er lögð áhersla á að yfirvöld, heilbrigðisstéttir, fagfélög og almenningur taki höndum saman og vinni að því að minnka byrði samfélagsins vegna hjarta-og æðasjúkdóma. Á Íslandi verður lögð sérstök áhersla á kransæðasjúkdóma hjá konum og mat á hættu á hjarta-og æðsjúkdómum.</p>


<p>Meginþættirnir sem tengjast heilbrigðu hjarta og æðakerfi eru:</p>

<ul>
<li>að reykja ekki</li>
<li>að fá nægjanleg líkamsþjálfun – minnst 30 mínútur 5 sinnum í viku,</li>
<li>að tileinka sér heilbrigðar matarvenjur,</li>
<li>að halda kjöþyngd,</li>
<li>að blóðþrýstingur sé undir 140/90,</li>
<li>að kólesteról í blóði sé undir 5 mmól/L (190mg/dl),</li>
<li>að sykurefnaskipti séu eðlileg,</li>
<li>að forðast mikið álag.</li>
</ul>

<p>Tengill: <a href="http://www.heartcharter.eu/download/icelandic.pdf">http://www.heartcharter.eu/download/icelandic.pdf</a></p>
                ',
            ]);
            makePage([
                'title' => 'GoRed',
                'parent_id' => $hjartasjukdomar->id,
                'content' => '
<h3>GoRed fyrir konur á Íslandi – forvarnir hjarta- og æðasjúkdóma</h3>

<p>Hjarta- og æðasjúkdómar eru algengasta dánarorsök kvenna á Íslandi líkt og annarsstaðar í heiminum. GoRed átakið  miðar að því að fræða konur um áhættuþætti og einkenni hjarta- og æðasjúkdóma og hvernig draga megi úr líkum á sjúkdómunum. Aukin vitund kvenna um áhættuþættina hefur einnig óbein áhrif á lífsstíl karla og ungmenna.</p>


<p><strong>GoRed átakið er alheimsátak á vegum World Heart Federation og á Íslandi er það unnið í samvinnu við Hjartavernd. Verndari átaksins er Ingibjörg Pálmadóttir, fyrrum heilbrigðisráðherra.</strong></p>

<h3>Af hverju GoRed</h3>
<p>Jafnmargar konur og karlar látast árlega af völdum hjarta- og æðasjúkdóma.</p>

<p>Konur gera sér ekki grein fyrir eigin áhættu.</p>

<p>Einkenni sjúkdómsins eru oftar óljósari hjá konum en körlum þannig að greiningarferli og áhættumat vegna hjarta- og æðasjúkdóma tefst oft.</p>

<h3>Hvaða konur eru í forgangi?</h3>
<p>Einkennalausar konur, 40 ára og eldri, ættu að fara í áhættumat til greiningar á áhættuþáttum á 5 ára fresti.</p>

<p>Einkennalausar konur yngri en 40 ára sem hafa ættarsögu um hjarta- og æðasjúkdóm hjá 1. gráðu ættingjum og/eða með sögu um ættgenga blóðfituröskun reglulega</p>

<h3>Hvernig höldum við áfram?</h3>
<p>Evrópska stefnuskráin um heilbrigði hjartans miðar að því að kortleggja hvernig forvörnum hjarta- og æðasjúkdóma er háttað í Evrópu. Hjartavernd er þátttakandi í verkefninu fyrir hönd Íslands, og miðar næsti áfangi að konum. Nánari upplýsingar um evrópsku stefnuskránna má finna á slóðinni  (http://hjartamidstodin.is/index.php?option=content&task=view&id=13&Itemid=36)</p>

<p>Mikilvægt er að tekið sé tillit til kvenna í gerð heilbrigðisáætlana er varða hjarta- og æðasjúkdóma. Einn þáttur í slíku er útbreiðsla skilaboða og vitundarvakning, líkt og GoRed fyrir konur.</p>

<h3>Ekki bíða til morguns – hugsaðu um hjartað þitt í dag!</h3>
<p>Frekari fróðleik um GoRed má finna á slóðinni hér að neðan</p>
<p><a href="http://www.lis.is/uploads/Items/3369/GoRed%20tool-kit-FINAL12020914.ppt#256,1,GoRed">http://www.lis.is/uploads/Items/3369/GoRed%20tool-kit-FINAL12020914.ppt#256,1,GoRed</a></p>
                ',
            ]);














            makePage([
                'title' => 'Hafa samband',
            ]);





        Model::reguard();
    }
}