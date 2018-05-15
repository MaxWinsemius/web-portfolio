<?php
$loadingSource = "admin";
require "includes/initialize.php";
require "includes/utils/header.php";

$id = $_GET['id'];
?>
<div class="widget">
    <div class="pageHeader">
        registraties
    </div>
    <div class="formSpace"></div>
    <div class="registerView">
        <table>
        <?php
        $keyName = ['Name'=>'Naam',
            'Initials'=>'Initialen',
            'CallName'=>'Roepnaam',
            'Sex'=>'Geslacht',
            'Street_And_Number'=>'Straat en huisnummer',
            'ZIP_Code'=>'Postcode',
            'City'=>'Stad',
            'Birthday'=>'Verjaardag',
            'Phone'=>'Telefoon',
            'Mobile'=>'Mobiel',
            'Email'=>'Email',
            'BSN_Option'=>'BSN optie',
            'BSN'=>'BSN',
            'Martial'=>'Gehuwd',
            'GPName'=>'Huisarts',
            'GPStreet_And_Number'=>'Straat en huisnummer',
            'GPZIP_Code'=>'Postcode',
            'GPPhone'=>'Telefoon',
            'REFName'=>'Referentie',
            'REFStreet_And_Number'=>'Straat en huisnummer',
            'REFZIP_Code'=>'Postcode',
            'REFCity'=>'Stad',
            'REFPhone'=>'Telefoon',
            'IName'=>'Zorgverzekering',
            'ICity'=>'Vestigingslocatie',
            'IDate'=>'Start verzekering',
            'IPolisnmr'=>'Polisnmr',
            'IPolis'=>'Aanvullend verzekerd',
            'Children'=>'Kinderen',
            'SBasis'=>'Basisschool',
            'SLagerBijzonderVormend'=>'Lager Bijzonder Vormend onderwijs',
            'SLagerBeroeps'=>'Lager Beroeps onderwijs',
            'SMiddelbaarVoortgezet'=>'Middelbaar Voortgezet onderwijs',
            'SMiddelbaarBeroeps'=>'Middelbaar Beroeps Onderwijs',
            'SHogerVoortgezet'=>'Hoger Voortgezet Onderwijs',
            'SHogerBeroeps'=>'Hoger Beroeps Onderwijs',
            'SVoorbereidendWetenschappelijk'=>'Voorbereidend Wetenschappelijk Onderwijs',
            'SWetenschappelijk'=>'Wetenschappelijk',
            'CurrentStudy'=>'Huidige studie',
            'CurrentJob'=>'Huidig beroep',
            'Sickness'=>'Ziektewet',
            'SicknessExpl'=>'Uitleg',
            'Divorced'=>'Gescheiden ouders',
            'DivorcedAge'=>'Leeftijd gescheiden ouders',
            'SocialContacts'=>'Sociale contacten',
            'FreeTimeExpl'=>'Vrije tijd en hobbies',
            'BelieveExpl'=>'Geloofsovertuiging',
            'Medics'=>'Medicijnen',
            'SUAlcohol'=>'Alcoholgebruik',
            'SUAlcoholExpl'=>'Uitleg',
            'SUDrugs'=>'Drugsgebruik',
            'SUDrugsExpl'=>'Uitleg',
            'SUTabacco'=>'Tabakgebruik',
            'SUTabaccoExpl'=>'Uitleg',
            'SUGamble'=>'Gokken',
            'SUGambleExpl'=>'Uitleg',
            'SUCoffee'=>'Koffiegebruik',
            'SUCoffeeExpl'=>'Uitleg',
            'SUInternetComputer'=>'Internet en comutergebruik',
            'SUInternetComputerExpl'=>'Uitleg',
            'SUOther'=>'Ander middelengebruik',
            'SUOtherExpl'=>'Uitleg',
            'SUProblematic'=>'Problemaatisch middelengebruik',
            'EarlierHelp'=>'Eerdere hulpverlening',
            'RERelation'=>'Problemen binnen vaste relatie',
            'REFamily'=>'Problemen binnen het gezin',
            'REContOthers'=>'Problemen met het contact opnemen met anderen',
            'REChildren'=>'Problemen met het opvoeden van kinderen',
            'REWorkStudy'=>'Problemen op het werk of in de studie',
            'RESadness'=>'Somberheid, uitzichtloosheid, lustelossheid, depressieve gevoelens',
            'REAgression'=>'Agressie, kwaadheid, ruzie maken',
            'REPsychStressed'=>'Overspannenheid, burn-out, chronische vermoeidheid',
            'REPhysStressed'=>'Lichamelijke spanningen en pijn, hyperventilatie',
            'REUncertain'=>'Onzekerheid, minderwaardigheid, lage zelfwaardering',
            'REForced'=>'Dwangmatige gedachten of handelingen',
            'REScared'=>'Angsten, fobie&euml;n, paniekaanvallen',
            'REMourning'=>'Problemen t.g.v. rouw, scheiding, ingrijpenden gebeurtenissen',
            'RESex'=>'Seksuele problemen, seksueel of lichamelijk misbruik',
            'RESleep'=>'Slaapproblemen',
            'REIllusions'=>'Problemen met fantasie, echtheid, eigenheid',
            'REThinkSuicide'=>'Gedachten aan su&iuml;cide',
            'REActionSuicide'=>'Pogingen tot su&iuml;cide',
            'REEating'=>'Eetproblemen',
            'RELawbreaking'=>'Gedragsproblemen zoals diefstal, bedrog, wetsovertredingen',
            'REOther'=>'Andere problemen',
            'PhysicalComplaints'=>'Lichamelijke klachten',
            'PhysicalComplaintsExpl'=>'Uitleg',
            'Complaints'=>'Klachten en Problemen',
            'WhatToChange'=>'Wat wilt persoon veranderen',
            'WhatIsGood'=>'Welke levensgebieden gaan goed',
            'DeclarationGP'=>'Toestemming voor informeren huisarts'];

        $yesnoOptions = [
            'IPolis'=>'Aanvullend verzekerd',
            'Children'=>'Kinderen',
            'SBasis'=>'Basisschool',
            'SLagerBijzonderVormend'=>'Lager Bijzonder Vormend onderwijs',
            'SLagerBeroeps'=>'Lager Beroeps onderwijs',
            'SMiddelbaarVoortgezet'=>'Middelbaar Voortgezet onderwijs',
            'SMiddelbaarBeroeps'=>'Middelbaar Beroeps Onderwijs',
            'SHogerVoortgezet'=>'Hoger Voortgezet Onderwijs',
            'SHogerBeroeps'=>'Hoger Beroeps Onderwijs',
            'SVoorbereidendWetenschappelijk'=>'Voorbereidend Wetenschappelijk Onderwijs',
            'SWetenschappelijk'=>'Wetenschappelijk',
            'Sickness'=>'Ziektewet',
            'Divorced'=>'Gescheiden ouders',
            'Medics'=>'Medicijnen',
            'SUAlcohol'=>'Alcoholgebruik',
            'SUDrugs'=>'Drugsgebruik',
            'SUTabacco'=>'Tabakgebruik',
            'SUGamble'=>'Gokken',
            'SUCoffee'=>'Koffiegebruik',
            'SUInternetComputer'=>'Internet en comutergebruik',
            'SUOther'=>'Ander middelengebruik',
            'SUProblematic'=>'Problemaatisch middelengebruik',
            'EarlierHelp'=>'Eerdere hulpverlening',
            'RERelation'=>'Problemen binnen vaste relatie',
            'REFamily'=>'Problemen binnen het gezin',
            'REContOthers'=>'Problemen met het contact opnemen met anderen',
            'REChildren'=>'Problemen met het opvoeden van kinderen',
            'REWorkStudy'=>'Problemen op het werk of in de studie',
            'RESadness'=>'Somberheid, uitzichtloosheid, lustelossheid, depressieve gevoelens',
            'REAgression'=>'Agressie, kwaadheid, ruzie maken',
            'REPsychStressed'=>'Overspannenheid, burn-out, chronische vermoeidheid',
            'REPhysStressed'=>'Lichamelijke spanningen en pijn, hyperventilatie',
            'REUncertain'=>'Onzekerheid, minderwaardigheid, lage zelfwaardering',
            'REForced'=>'Dwangmatige gedachten of handelingen',
            'REScared'=>'Angsten, fobie&euml;n, paniekaanvallen',
            'REMourning'=>'Problemen t.g.v. rouw, scheiding, ingrijpenden gebeurtenissen',
            'RESex'=>'Seksuele problemen, seksueel of lichamelijk misbruik',
            'RESleep'=>'Slaapproblemen',
            'REIllusions'=>'Problemen met fantasie, echtheid, eigenheid',
            'REThinkSuicide'=>'Gedachten aan su&iuml;cide',
            'REActionSuicide'=>'Pogingen tot su&iuml;cide',
            'REEating'=>'Eetproblemen',
            'RELawbreaking'=>'Gedragsproblemen zoals diefstal, bedrog, wetsovertredingen',
            'REOther'=>'Andere problemen',
            'DeclarationGP'=>'Toestemming voor informeren huisarts',
            'PhysicalComplaints'=>'Lichamelijke klachten'];
        $sex = ['Vrouw','Man'];
        $martial = ['Alleenstaand','Gehuwd','Samenwonend','Relatie'];
        $BSN = ['Rijbewijs','Paspoort','ID-kaart'];
        $socialCont = [0,'1 tot 2','3 tot 4',' 5 tot 6'];

            $db->executeQuery("UPDATE `Clients` SET `checked` = '1' WHERE `ID` = " . $id . ";");
            $row = $db->receiveQuery("SELECT * FROM `Clients` WHERE `ID` = " . $id .";");
            foreach($row[0] as $key => $value) :
                if(isset($keyName[$key])) :
                    ?>
                        <tr>
                            <td><?= $keyName[$key] ?></td>
                            <td>
                            <?php
                                if($key == 'Sex') {
                                    echo $sex[$value];
                                } elseif($key == 'BSN_Option') {
                                    echo $BSN[$value];
                                } elseif($key == 'SocialContacts') {
                                    echo $socialCont[$value];
                                } elseif($key == 'Martial') {
                                    echo $martial[$value];
                                } elseif(isset($yesnoOptions[$key])) {
                                    echo $value == 0 ? 'Nee' : 'Ja';
                                } elseif($key == 'Email') {
                                    echo "<a href='mailto:" . $value . "'>" . $value . "</a>";
                                } else {
                                    echo $value;
                                }
                            ?>
                            </td>
                        </tr>
                    <?php
                endif;
            endforeach;
        ?>
        </table>
    </div>
    <div class="formSpace"></div>
    <div class="registerView shortList">
        <div class="formItem">
            <h3>Gewenste producten:</h3>
        </div>
        <table>
            <?php
            $row = $db->receiveQuery("SELECT `Tags`.`Name`,`Tags`.`ID` FROM `Tags`" .
                "RIGHT JOIN `ClientToTag`" .
                "ON `ClientToTag`.`TagID` = `Tags`.`ID`" .
                "WHERE `ClientToTag`.`ClientID` = " . $id);
            if(count($row) > 0) :
                foreach($row as $product) : ?>
                    <tr>
                        <td>
                            <a href="?page=7&id=<?= $product['ID'] ?>">
                                <?= $product['Name'] ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;
            endif; ?>

        </table>
    </div>
    <div class="formSpace"></div>
    <div class="registerView shortList">
        <div class="formItem">
            <h3>Momenten van afspraken</h3>
        </div>
        <table>
            <?php
            $day = ['Maandag','Dinsdag','Woensdag','Donderdag','Vrijdag'];
            $momentA = ['Ochtend','Middag','Avond'];
            $row = $db->receiveQuery("SELECT * FROM `appointment` WHERE `clientID` = '" . $id . "'");
            if(count($row) > 0) :
                foreach($row as $moment) : ?>
                    <tr>
                        <td><?= $day[$moment['day']]; ?></td>
                        <td><?= $momentA[$moment['dayPart']]; ?></td>
                    </tr>
                <?php endforeach;
            endif; ?>

        </table>
    </div>
    <div class="formSpace"></div>
    <div class="registerView shortList" id="Children">
        <div class="formItem">
            <h3>Kinderen</h3>
        </div>
        <table>
            <?php
            $row = $db->receiveQuery("SELECT * FROM `Childeren` WHERE `clientID` = '" . $id . "'");
            if(count($row) > 0) :
                foreach($row as $moment) : ?>
                    <tr>
                        <td><?= !empty($moment['Name']) ? $moment['Name'] : ''; ?></td>
                        <td><?= !empty($moment['Age']) ? $moment['Age'] : ''; ?></td>
                    </tr>
                <?php endforeach;
            endif;?>
        </table>
    </div>
    <div class="formSpace"></div>
    <div class="registerView shortList" id="Family">
        <div class="formItem">
            <h3>Familie</h3>
        </div>
        <table>
            <?php
            $row = $db->receiveQuery("SELECT * FROM `Family` WHERE `clientID` = '" . $id . "'");
            $person = ['Moeder','Vader','Broer','Zus'];
            if(count($row) > 0) :
                foreach($row as $moment) : ?>
                    <tr>
                        <td><?= !empty($moment['Person']) || $moment['Person'] == 0 ? $person[$moment['Person']] : ''; ?></td>
                        <td><?= !empty($moment['Name']) ? $moment['Name'] : ''; ?></td>
                        <td><?= !empty($moment['Age']) ? $moment['Age'] : ''; ?></td>
                        <td><?= !empty($moment['JobStudy']) ? $moment['JobStudy'] : ''; ?></td>
                    </tr>
                <?php endforeach;
            endif; ?>
        </table>
    </div>
    <div class="formSpace"></div>
    <div class="registerView shortList" id="Medics">
        <div class="formItem">
            <h3>Medics</h3>
        </div>
        <table>
            <?php
            $row = $db->receiveQuery("SELECT * FROM `Medics` WHERE `clientID` = '" . $id . "'");
            if(count($row) > 0) :
                foreach($row as $moment) : ?>
                    <tr>
                        <td><?= !empty($moment['Name']) ? $moment['Name'] : ''; ?></td>
                        <td><?= !empty($moment['Amount']) ? $moment['Amount'] : ''; ?></td>
                        <td><?= !empty($moment['Frequency']) ? $moment['Frequency'] : ''; ?></td>
                    </tr>
                <?php endforeach;
            endif; ?>
        </table>
    </div>
    <div class="formSpace"></div>
    <div class="registerView shortList" id="Help">
        <div class="formItem">
            <h3>Vorige hulpverlening</h3>
        </div>
        <table>
            <?php
            $row = $db->receiveQuery("SELECT * FROM `PrevHelp` WHERE `clientID` = '" . $id . "'");
            if(count($row) > 0) :
                foreach($row as $moment) : ?>
                    <tr>
                        <td><?= !empty($moment['Name']) ? $moment['Name'] : ''; ?></td>
                        <td><?= !empty($moment['City']) ? $moment['City'] : ''; ?></td>
                        <td><?= !empty($moment['Year']) ? $moment['Year'] : ''; ?></td>
                    </tr>
                <?php endforeach;
            endif; ?>
        </table>
    </div>
</div>