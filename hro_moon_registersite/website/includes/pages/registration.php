
<div class="widget">
    <div class="pageHeader">
        Registratie
    </div>
    <div class="registrationForm" id="form">
        <form>
            <div class="formSpace"></div>
            <h3>Persoonlijke gegevens</h3>
            <div class="formItem"><input type="text" name="Name" placeholder="Achternaam" maxlength="200"></div>
            <div class="formItem"><input type="text" name="Initials" placeholder="Voorletters" maxlength="20"></div>
            <div class="formItem"><input type="text" name="CallName" placeholder="Roepnaam" maxlength="200"></div>
            <div class="formItem" id="sex">
                <label><input type="radio" name="Sex" id="Male" value="Male"> Man</label>
                <label><input type="radio" name="Sex" id="Female" value="Female"> Vrouw</label>
            </div>
            <div class="formItem"><input type="text" name="Street_And_Number" placeholder="Straat en huisnummer" maxlength="200"></div>
            <div class="formItem"><input type="text" name="ZIPCode" placeholder="Postcode" maxlength="6"></div>
            <div class="formItem"><input type="text" name="City" placeholder="Woonplaats" maxlength="200"></div>
            <div class="formItem">Geboortedatum: <input type="date" name="Birthday" placeholder="Verjaardag"></div>
            <div class="formItem"><input type="text" name="Phone" placeholder="Telefoonnummer" maxlength="10"></div>
            <div class="formItem"><input type="text" name="Mobile" placeholder="Mobiele telefoonnummer" maxlength="10"></div>
            <div class="formItem"><input type="email" name="Email" placeholder="Email-adres" maxlength="200"></div>
            <div class="formItem" id="BSN_OPT_MSG">
                <label><input type="radio" name="BSN_Option" id="BSN0" value="0"> Rijbewijs</label>
                <label><input type="radio" name="BSN_Option" id="BSN1" value="1"> Paspoort</label>
                <label><input type="radio" name="BSN_Option" id="BSN2" value="2"> ID-kaart</label>
            </div>
            <div class="formItem"><input type="text" name="BSN" placeholder="BSN / Sofinummer" maxlength="11"></div>
            <div class="formItem" id="Martial">
                <label><input type="radio" name="Martial" id="Alone" value="0"> Alleenstaand</label>
                <label><input type="radio" name="Martial" id="Married" value="1"> Gehuwd</label>
                <label><input type="radio" name="Martial" id="Together" value="2"> Samenwonend</label>
                <label><input type="radio" name="Martial" id="Relation" value="3"> Relatie</label>
            </div>

            <div class="formSpace"></div>

            <h3>Huisarts</h3>
            <div class="formItem"><input type="text" name="GPName" placeholder="Naam" maxlength="200"></div>
            <div class="formItem"><input type="text" name="GPStreet_And_Number" placeholder="Straat en huisnummer" maxlength="200"></div>
            <div class="formItem"><input type="text" name="GPZIP_Code" placeholder="Postcode" maxlength="6"></div>
            <div class="formItem"><input type="text" name="GPCity" placeholder="Stad" maxlength="200"></div>
            <div class="formItem"><input type="text" name="GPPhone" placeholder="Telefoonnummer" maxlength="10"></div>

            <div class="formSpace"></div>

            <h3>Verwijzing</h3>
            <div class="formItem"><input type="text" name="REFName" placeholder="Naam" maxlength="200"></div>
            <div class="formItem"><input type="text" name="REFStreet_And_Number" placeholder="Straat en huisnummer" maxlength="200"></div>
            <div class="formItem"><input type="text" name="REFZIP_Code" placeholder="Postcode" maxlength="6"></div>
            <div class="formItem"><input type="text" name="REFCity" placeholder="Stad" maxlength="200"></div>
            <div class="formItem"><input type="text" name="REFPhone" placeholder="Telefoonnummer" maxlength="10"></div>

            <div class="formSpace"></div>


            <h3>Ziektekostenverzekeraar</h3>
            <div class="formItem"><input type="text" name="IName" placeholder="Naam" maxlength="200"></div>
            <div class="formItem"><input type="text" name="ICity" placeholder="Vestigingslocatie" maxlength="200"></div>
            <div class="formItem">Datum start verzekering: <input type="date" name="IDate" maxlength="200"></div>
            <div class="formItem"><input type="text" name="IPolisnmr" placeholder="Polisnummer" maxlength="11"></div>
            <div class="formItem"><label><input type="checkbox" name="IPolis" value="true"> Aanvullend verzekerd</label></div>

            <div class="formSpace" id="familyComp"></div>

            <h3>Gezinssamenstelling</h3>
            <div class="formItem"><label><input type="checkbox" name="Children" id="children"> Kinderen</label></div>
            <div class="formItemCollection" id="childrenInput" style="display: none">
                <div class="childrenAdd" id="childrenAdd">
                    <input type="button" value="Kind toevoegen" />
                </div>
                <div class="formItem">
                    <input type="text" name="NameChild[0]" placeholder="Naam" maxlength="255">
                    <input type="text" name="AgeChild[0]" placeholder="Leeftijd" maxlength="4">
                </div>
            </div>

            <div class="formSpace"></div>

            <h3>Opleiding</h3>
            <div>
                <div class="formItem"><label><input type="checkbox" name="SBasis"> Basisschool</label></div>
                <div class="formItem"><label><input type="checkbox" name="SLagerBijzonderVormend"> Lager bijzonder vormend onderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SLagerBeroeps"> Lager beroepsonderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SMiddelbaarVoortgezet"> Middelbaar voortgezet onderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SMiddelbaarBeroeps"> Middelbaar beroeps onderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SHogerVoortgezet"> Hoger voortgezet onderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SHogerBeroeps"> Hoger beroepsonderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SVoorbereidendWetenschappelijk"> Voorbereidend wetenschappelijk onderwijs</label></div>
                <div class="formItem"><label><input type="checkbox" name="SWetenschappelijk"> Wetenschappelijk onderwijs</label></div>
            </div>

            <div class="formSpace"></div>

            <div class="formItemText"><textarea name="CurrentStudy" placeholder="Huidige studie"></textarea></div>

            <div class="formItemText"><textarea name="CurrentJob" placeholder="Huidig beroep"></textarea></div>

            <div class="formSpace"></div>

            <div class="formItem"><label><input type="checkbox" name="Sickness" id="sickness"> Ziektewet</label></div>
            <div class="formItemText" id="sicknessExpl" style="display: none;"><textarea name="SicknessExpl" placeholder="Sinds"></textarea></div>

            <div class="formSpace" id="familyOrigin"></div>

            <div class="formItem short">
                <span class="familyName">Vader: </span><input type="hidden" name="familyPerson[0]" value="1">
                    <input type="text" name="familyName[0]" placeholder="Naam" maxlength="200">
                    <input type="text" name="familyAge[0]" placeholder="Leeftijd" maxlength="3">
                    <input type="text" name="familyJob[0]" placeholder="Beroep / studie" maxlength="200">
            </div>
            <div class="formItem short">
                <span class="familyName">Moeder: </span><input type="hidden" name="familyPerson[1]" value="0">
                    <input type="text" name="familyName[1]" placeholder="Naam" maxlength="200">
                    <input type="text" name="familyAge[1]" placeholder="Leeftijd" maxlength="3">
                    <input type="text" name="familyJob[1]" placeholder="Beroep / studie" maxlength="200">
            </div>

            <div class="formItemCollection" id="familyInput">
                <div class="formItem">
                    <input type="button" id="familyBrother" value="Voeg broer toe" />
                    <input type="button" id="familySister" value="Voeg zus toe" />
                </div>
            </div>

            <div class="formItem"><label><input type="checkbox" name="Divorced" id="divorced"> Gescheiden ouders</label></div>
            <div class="formItem" id="divorcedAge" style="display: none"><label><input type="text" name="DivorcedAge" placeholder="Leeftijd"> Hoe oud was je toen je ouders gingen scheiden?</label></div>

            <div class="formSpace"></div>

            <div class="formItem">
                Sociale contacten
                <select name="SocialContacts">
                    <option value="0">Geen</option>
                    <option value="1">1-2</option>
                    <option value="2">3-4</option>
                    <option value="3">5-6</option>
                </select>
            </div>

            <div class="formItemText"><textarea name="FreeTimeExpl" placeholder="Hobbies / Vrije tijd"></textarea></div>

            <div class="formItemText"><textarea name="BelieveExpl" placeholder="Geloofsovertuiging"></textarea></div>

            <div class="formSpace" id="medics"></div>

            <div class="formItem"><label><input type="checkbox" name="Medics" id="medics"> Medicatie</label></div>
            <div class="formItemCollection" id="medicsInput">
                <input type="button" id="medicsAdd" value="Voeg medicijn toe" />
                <div class="formItem short">
                    <input type="text" name="medicsName[0]" maxlength="200" placeholder="Naam">
                    <input type="text" name="medicsAmount[0]" maxlength="200" placeholder="Hoeveelheid">
                    <input type="text" name="medicsFrequency[0]" maxlength="200" placeholder="Hoevaak">
                </div>
            </div>

            <div class="formSpace"></div>

            <h3>Middelengebruik</h3>
            <div class="formItem"><label><input type="checkbox" name="SUAlcohol" id="SUAlcohol"> Alcohol</label></div>
            <div class="formItemText" id="SUAlcoholExpl" style="display: none"><textarea name="SUAlcoholExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUDrugs" id="SUDrugs"> Drugs</label></div>
            <div class="formItemText" id="SUDrugsExpl" style="display: none"><textarea name="SUDrugsExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUTabacco" id="SUTabacco"> Tabak</label></div>
            <div class="formItemText" id="SUTabaccoExpl" style="display: none"><textarea name="SUTabaccoExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUGamble" id="SUGamble"> Gokken</label></div>
            <div class="formItemText" id="SUGambleExpl" style="display: none"><textarea name="SUGambleExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUCoffee" id="SUCoffee"> Koffie</label></div>
            <div class="formItemText" id="SUCoffeeExpl" style="display: none"><textarea name="SUCoffeeExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUInternetComputer" id="SUInternetComputer"> Computer en Internet</label></div>
            <div class="formItemText" id="SUInternetComputerExpl" style="display: none"><textarea name="SUInternetComputerExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUOther" id="SUOther"> Anders</label></div>
            <div class="formItemText" id="SUOtherExpl" style="display: none"><textarea name="SUOtherExpl" placeholder="Namelijk"></textarea></div>

            <div class="formItem"><label><input type="checkbox" name="SUProblematic"> Problematisch gebruik van middelen?</label></div>

            <div class="formSpace" id="earlierHelp"></div>

            <div class="formItem"><label><input type="checkbox" name="EarlierHelp" id="EarlierHelp"> Eerdere hulpverlening</label></div>
            <div class="formItemCollection" id="helpInput" style="display: none">
                <input type="button" id="helpAdd" value="Voeg hulpverlener toe" />
                <div class="formItem short">
                    <input type="text" name="helpName[0]" maxlength="200" placeholder="Naam">
                    <input type="text" name="helpCity[0]" maxlength="200" placeholder="Stad">
                    <input type="text" name="helpYear[0]" maxlength="4" placeholder="Jaar">
                </div>
            </div>

            <div class="formSpace"></div>

            <h3 id="Reason">Klachten en problemen</h3>
            <div class="formItem"><label><input type="checkbox" name="RERelation"> Problemen binnen vaste relatie</label></div>
            <div class="formItem"><label><input type="checkbox" name="REFamily"> Problemen binnen het gezin</label></div>
            <div class="formItem"><label><input type="checkbox" name="REContOthers"> Problemen met het contact opnemen met anderen</label></div>
            <div class="formItem"><label><input type="checkbox" name="REChildren"> Problemen met het opvoeden van kinderen</label></div>
            <div class="formItem"><label><input type="checkbox" name="REWorkStudy"> Problemen op het werk of in de studie</label></div>
            <div class="formItem"><label><input type="checkbox" name="RESadness"> Somberheid, uitzichtloosheid, lusteloosheid, depressieve gevoelens</label></div>
            <div class="formItem"><label><input type="checkbox" name="REAgression"> Agressie, kwaadheid, ruzie maken</label></div>
            <div class="formItem"><label><input type="checkbox" name="REPsychStressed"> Overspannenheid, burn-out, chronische vermoeidheid</label></div>
            <div class="formItem"><label><input type="checkbox" name="REPhysStressed"> Lichamelijke spanningen en pijn, hyperventilatie</label></div>
            <div class="formItem"><label><input type="checkbox" name="REUncertain"> Onzekerheid, miderwaardigheid, lage zelfwaardering</label></div>
            <div class="formItem"><label><input type="checkbox" name="REForced"> Dwangmatige gedachten of handelingen</label></div>
            <div class="formItem"><label><input type="checkbox" name="REScared"> Angsten, fobieën, paniekaanvallen</label></div>
            <div class="formItem"><label><input type="checkbox" name="REMourning"> Problemen t.g.v. rouw, scheiding, ingrijpende gebeurtenissen</label></div>
            <div class="formItem"><label><input type="checkbox" name="RESex"> Seksuele problemen, seksueel of lichamelijk misbruik</label></div>
            <div class="formItem"><label><input type="checkbox" name="RESleep"> slaapproblemen</label></div>
            <div class="formItem"><label><input type="checkbox" name="REIllusions"> Problemem met fantasie, echtheid, eigenheid</label></div>
            <div class="formItem"><label><input type="checkbox" name="REThinkSuicide"> Gedachten aan su&iuml;cide</label></div>
            <div class="formItem"><label><input type="checkbox" name="REActionSuicide"> Pogingen tot su&iuml;cide</label></div>
            <div class="formItem"><label><input type="checkbox" name="REEating"> Eetproblemen</label></div>
            <div class="formItem"><label><input type="checkbox" name="RELawbreaking"> Gedragsproblemen zoals diefstal, bedrog, wetsovertredingen</label></div>
            <div class="formItem"><label><input type="checkbox" name="REOther" id="REOther"> Andere problemen</label></div>
            <div class="formItemText" id="REOtherExpl" style="display: none"><textarea name="REOtherExpl" placeholder="Namelijk"></textarea></div>

            <div class="formSpace"></div>

            <div class="formItem"><label><input type="checkbox" name="PhysicalComplaints" id="physCompl"> Lichamelijke klachten</label></div>
            <div class="formItemText" id="physComplExpl" style="display: none"><textarea name="PhysicalComplaintsExpl" placeholder="Namelijk"></textarea></div>

            <div class="formSpace"></div>

            <div class="formItemText"><textarea name="Complaints" placeholder="Klachten en Problemen"></textarea></div>

            <div class="formSpace"></div>

            <div class="formItemText"><textarea name="WhatToChange" placeholder="Wat wilt u veranderen of bereiken?"></textarea></div>

            <div class="formItemText"><textarea name="WhatIsGood" placeholder="Binnen welke levensgebieden gaat het relatief goed met u?"></textarea></div>

            <div class="formSpace"></div>

            <h3>Verklaring huisarts</h3>
            <div class="formItem"><label><input type="checkbox" name="DeclarationGP">Hierbij geef ik toestemming aan de behandelaar om mijn huisarts te informeren over de aanmelding, het verloop en het resultaat van de behandeling.</label></div>

            <div class="formSpace"></div>

            <div class="formItem">U wordt aangemeld voor de nieuwsbrief, indien gewenst kunt u zich hiervoor afmelden.</div>

            <div style="height: 40px;"></div>
            <div id="submitMessage" style="display: none;"></div>
            <div id="submitMessageSpace" style="height: 40px; display: none;"></div>

            <div class="formItem"><input type="button" name="submit" id="submit" value="Verzenden"></div>

            <div id="ajaxResponse"></div>
        </form>
        <script>

            $(document).ready(function() {
                //The children question handling
                var iChild = 1;
                var childrenHTML = '<div class="formItem"><input type="text" name="NameChild['+iChild+']" placeholder="Naam"><input type="text" name="AgeChild['+iChild+']" placeholder="Leeftijd"><input type="button" id="childDelete" value="Verwijder kind" /></div>';
                $("#children").change(function(){
                    $("#childrenInput").toggle();
                });

                $(document).on("click", "#childDelete", function (e) {
                    $(e.target).parent().remove();
                });

                $(document).on("click","#childrenAdd",function(){
                    childrenHTML = '<div class="formItem"><input type="text" name="NameChild['+iChild+']" placeholder="Naam"><input type="text" name="AgeChild['+iChild+']" placeholder="Leeftijd"><input type="button" id="childDelete" value="Verwijder kind" /></div>';
                    $("#childrenInput").append(childrenHTML);
                    iChild++;
                });

                //The family question handling
                var iFam = 2;
                var brotherHTML = '<div class="formItem short"><span class="familyName">Broer: </span>' +
                    '<input type="hidden" name="familyPerson['+iFam+']" value="2">' +
                    '<input type="text" name="familyName['+iFam+']" placeholder="Naam" maxlength="200">' +
                    '<input type="text" name="familyAge['+iFam+']" placeholder="Leeftijd" maxlength="3">' +
                    '<input type="text" name="familyJob['+iFam+']" placeholder="Beroep / studie" maxlength="200">' +
                    '<input type="button" id="familyDelete" value="Verwijder broer" />' +
                    '</div>';
                var brotherHTML = '<div class="formItem short"><span class="familyName">Broer: </span>' +
                    '<input type="hidden" name="familyPerson['+iFam+']" value="2">' +
                    '<input type="text" name="familyName['+iFam+']" placeholder="Naam" maxlength="200">' +
                    '<input type="text" name="familyAge['+iFam+']" placeholder="Leeftijd" maxlength="3">' +
                    '<input type="text" name="familyJob['+iFam+']" placeholder="Beroep / studie" maxlength="200">' +
                    '<input type="button" id="familyDelete" value="Verwijder broer" />' +
                    '</div>';

                $("#familyBrother").click(function() {
                    brotherHTML = '<div class="formItem short"><span class="familyName">Broer: </span>' +
                    '<input type="hidden" name="familyPerson['+iFam+']" value="2">' +
                    '<input type="text" name="familyName['+iFam+']" placeholder="Naam" maxlength="200">' +
                    '<input type="text" name="familyAge['+iFam+']" placeholder="Leeftijd" maxlength="3">' +
                    '<input type="text" name="familyJob['+iFam+']" placeholder="Beroep / studie" maxlength="200">' +
                    '<input type="button" id="familyDelete" value="Verwijder broer" />' +
                    '</div>';
                    $("#familyInput").append(brotherHTML);
                    iFam++;
                });

                $("#familySister").click(function() {
                    sisterHTML = '<div class="formItem short"><span class="familyName">Zus: </span>' +
                    '<input type="hidden" name="familyPerson['+iFam+']" value="3">' +
                    '<input type="text" name="familyName['+iFam+']" placeholder="Naam" maxlength="200">' +
                    '<input type="text" name="familyAge['+iFam+']" placeholder="Leeftijd" maxlength="3">' +
                    '<input type="text" name="familyJob['+iFam+']" placeholder="Beroep / studie" maxlength="200">' +
                    '<input type="button" id="familyDelete" value="Verwijder zus" />' +
                    '</div>';
                    $("#familyInput").append(sisterHTML);
                    iFam++;
                });

                $(document).on("click","#familyDelete",function(e) {
                    $(e.target).parent().remove();
                });

                //The medicals question handling
                var iMed = 1;
                var medicsHTML = '<div class="formItem short">' +
                    '<input type="text" name="medicsName['+iMed+']" maxlength="200" placeholder="Naam">' +
                    '<input type="text" name="medicsAmount['+iMed+']" maxlength="200" placeholder="Hoeveelheid">' +
                    '<input type="text" name="medicsFrequency['+iMed+']" maxlength="200" placeholder="Hoevaak">' +
                    '<input type="button" id="medicsDelete" value="Verwijder medicijn" />' +
                    '</div>';

                $("#medics").change(function() {
                    $("#medicsInput").toggle();
                });

                $(document).on("click", "#medicsAdd", function() {
                    medicsHTML = '<div class="formItem short">' +
                    '<input type="text" name="medicsName['+iMed+']" maxlength="200" placeholder="Naam">' +
                    '<input type="text" name="medicsAmount['+iMed+']" maxlength="200" placeholder="Hoeveelheid">' +
                    '<input type="text" name="medicsFrequency['+iMed+']" maxlength="200" placeholder="Hoevaak">' +
                    '<input type="button" id="medicsDelete" value="Verwijder medicijn" />' +
                    '</div>';
                    $("#medicsInput").append(medicsHTML);
                    iMed++;
                });

                $(document).on("click", "#medicsDelete", function(e) {
                    $(e.target).parent().remove();
                });

                //The previous help question handling
                var iHelp = 1;
                var helpHTML = '<div class="formItem short">' +
                    '<input type="text" name="helpName['+iHelp+']" maxlength="200" placeholder="Naam">' +
                    '<input type="text" name="helpCity['+iHelp+']" maxlength="200" placeholder="Stad">' +
                    '<input type="text" name="helpYear['+iHelp+']" maxlength="4" placeholder="Jaar">' +
                    '<input type="button" id="helpDelete" value="Verwijder hulpverlener" />' +
                    '</div>';

                $("#EarlierHelp").change(function() {
                    $("#helpInput").toggle();
                });

                $(document).on("click","#helpAdd",function() {
                    helpHTML = '<div class="formItem short">' +
                    '<input type="text" name="helpName['+iHelp+']" maxlength="200" placeholder="Naam">' +
                    '<input type="text" name="helpCity['+iHelp+']" maxlength="200" placeholder="Stad">' +
                    '<input type="text" name="helpYear['+iHelp+']" maxlength="4" placeholder="Jaar">' +
                    '<input type="button" id="helpDelete" value="Verwijder hulpverlener" />' +
                    '</div>';
                    $("#helpInput").append(helpHTML);
                    iHelp++;
                });

                $(document).on("click","#helpDelete",function(e) {
                    $(e.target).parent().remove();
                });

                //The question handling for "Yes, because"
                $("#sickness").change(function() {
                    $("#sicknessExpl").toggle();
                });

                $("#divorced").change(function() {
                    $("#divorcedAge").toggle();
                });

                $("#SUAlcohol").change(function() {
                    $("#SUAlcoholExpl").toggle();
                });

                $("#SUDrugs").change(function() {
                    $("#SUDrugsExpl").toggle();
                });

                $("#SUTabacco").change(function() {
                    $("#SUTabaccoExpl").toggle();
                });

                $("#SUGamble").change(function() {
                    $("#SUGambleExpl").toggle();
                });

                $("#SUCoffee").change(function() {
                    $("#SUCoffeeExpl").toggle();
                });

                $("#SUInternetComputer").change(function() {
                    $("#SUInternetComputerExpl").toggle();
                });

                $("#SUOther").change(function() {
                    $("#SUOtherExpl").toggle();
                });

                $("#REOther").change(function() {
                    $("#REOtherExpl").toggle();
                });

                $("#physCompl").change(function() {
                    $("#physComplExpl").toggle();
                });

            });

            $(document).ready(function() {
                $("#submit").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "registerForm.php",
                        data: $("form").serialize()
                    })
                        .done(function(html) {
                            $("#ajaxResponse").empty().append(html);
                        });
                });
            });
        </script>
    </div>
</div>