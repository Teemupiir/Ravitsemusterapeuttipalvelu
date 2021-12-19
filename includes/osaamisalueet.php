<?php
    //checkboxit seuraavalla tavalla
    //$check_value = isset($_POST['my_checkbox_name']) ? 1 : 0; tai sitten !empty
    $check_value = !empty($_POST['cbxElintapa']) ? 1 : 0;
    $check_value1 = isset($_POST['cbxKasvis']) ? 1 : 0;   
?>

<div class="form-row">
    <div class="col-md-4">
        <hr>
        <p style="font-weight: bold;"> Koulutukseen kuuluvat osa-alueet</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="cbxElintapa" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Arkiruokailu ja elintapaohjaus 
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="cbxKasvis" checked required  disabled>
            <label class="form-check-label" for="invalidCheck2">
            Kasvisruokailijan ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxKeliakia" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Keliakia ja allergiat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxLaillistettu" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Laillistetun ravitsemusterapeutin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxPainonhallinta" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Painonhallinta ja syömiskäyttäytyminen
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxSuolisto" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Suolisto- ja vatsaongelmat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxSydan" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Sydän- ja verisuonitautien ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxDiabetes2" checked required disabled>
            <label class="form-check-label" for="invalidCheck2">
            Tyypin 2 diabeteksen ravitsemushoito
            </label>
        </div>

        <hr>
        <p style="font-weight: bold;"> Erityisosaamiset</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxVanhus">
            <label class="form-check-label" for="invalidCheck2">
            Ikääntyneiden ruokavalio
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxUrheilu">
            <label class="form-check-label" for="invalidCheck2">
            Urheiluravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxBulimia">
            <label class="form-check-label" for="invalidCheck2">
            Syömishäiriöt & tunnesyöminen
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxDiabetes1">
            <label class="form-check-label" for="invalidCheck2">
            Tyypin 1 diabeteksen ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxVegaani">
            <label class="form-check-label" for="invalidCheck2">
            Vegaaniravitsemus
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <hr>
        <p style="font-weight: bold;"> Sairaudet</p>
    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxAllergia">
            <label class="form-check-label" for="invalidCheck2">
            Allergiat
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxDiabetes">
            <label class="form-check-label" for="invalidCheck2">
            Diabetes
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cbxFodmap">
        <label class="form-check-label" for="invalidCheck2">
        FODMAP-ruokavalio
        </label>
    </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxKeliakia">
            <label class="form-check-label" for="invalidCheck2">
            Keliakia
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxKeuhko">
            <label class="form-check-label" for="invalidCheck2">
            Keuhkosairauksien ravitsemushoito
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxLihavuus">
            <label class="form-check-label" for="invalidCheck2">
            Lihavuusleikkaukset
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cbxMunuais">
        <label class="form-check-label" for="invalidCheck2">
        Munuaissairauksien ravitsemushoito
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cbxNeuro">
        <label class="form-check-label" for="invalidCheck2">
        Neurologisten sairauksien hoito
        </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxPsykiatriset">
            <label class="form-check-label" for="invalidCheck2">
            Psykiatristen potilaiden ravitsemus
            </label>
        </div>
        
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxReuma">
            <label class="form-check-label" for="invalidCheck2">
            Reumasairaudet ja ravitsemus
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cbxRuoansulatus">
        <label class="form-check-label" for="invalidCheck2">
        Ruoansulatuskanavan sairauksien ravitsemushoito
        </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxSydan">
            <label class="form-check-label" for="invalidCheck2">
            Sydän- ja verisuoniterveys
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="cbxBulimia">
        <label class="form-check-label" for="invalidCheck2">
        Syömishäiriöt
        </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxSyopa">
            <label class="form-check-label" for="invalidCheck2">
            Syöpä ja ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxArtynyt">
            <label class="form-check-label" for="invalidCheck2">
            Ärtyneen suolen oireyhtymän ravitsemushoito
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <hr>
        <p style="font-weight: bold;"> Hyvinvointi</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxVanhus">
            <label class="form-check-label" for="invalidCheck2">
            Ikääntyneiden ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxKasvis">
            <label class="form-check-label" for="invalidCheck2">
            Kasvisruokavaliot
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxKirurgiset">
            <label class="form-check-label" for="invalidCheck2">
            Kirurgisten potilaiden ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxLapset">
            <label class="form-check-label" for="invalidCheck2">
            Lasten ja nuorten ravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxPainonhallinta">
            <label class="form-check-label" for="invalidCheck2">
            Painonhallinta/laihdutus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxRyhmat">
            <label class="form-check-label" for="invalidCheck2">
            Ryhmäohjaus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxUrheilu">
            <label class="form-check-label" for="invalidCheck2">
            Liikuntaravitsemus
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxNutrigen">
            <label class="form-check-label" for="invalidCheck2">
            Nutrigenomiikka
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxTyoterveys">
            <label class="form-check-label" for="invalidCheck2">
            Työterveyshuollon pätevyys
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxRuokapalvelut">
            <label class="form-check-label" for="invalidCheck2">
            Ruokapalvelut
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="cbxElintarvikkeet" >
            <label class="form-check-label" for="invalidCheck2">
            Terveysvaikutteiset elintarvikkeet
            </label>
        </div>
    </div>
</div>