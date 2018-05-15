<?php
require_once "includes/initialize.php";

//Authentication
$auth = new \moonconsultancy\Authentication\Authentication();
$foo = $auth->checkAuth();
if($auth->Authenticated === false) {
    echo "<div class=\"registerCollection\">Please don't try that. That would suck, if you did that. Really. A lot.</div>";
    exit;
}

$db = new \moonconsultancy\database\DB(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DBNAME);

if($_POST['option'] == "name" || empty($_POST['search'])) {
    $rows = $db->receiveQuery("SELECT `ID`,`Name`,`Initals`,`CallName`,`checked` FROM `Clients` WHERE CONCAT(`CallName`, ' ', `Name`) LIKE '%" . $_POST['search'] . "%' ORDER BY `ID` DESC LIMIT " . (empty($_POST['offset']) ? "0" : $_POST['offset']) . ", 50");
} elseif($_POST['option'] == "tag") {
    $rows = $db->receiveQuery("SELECT `Clients`.`ID`, `Clients`.`Name`, `Clients`.`Initals`, `Clients`.`CallName`, `Clients`.`checked`".
        "FROM `Clients` ".
        "RIGHT JOIN `ClientToTag`".
        "ON `Clients`.`ID` = `ClientToTag`.`ClientID`".
        "WHERE `ClientToTag`.`TagID` = (" .
            "SELECT `Tags`.`ID`" .
            "FROM `Tags`" .
            "WHERE `Tags`.`Name` LIKE '%" . $_POST['search'] . "%'" .
            ")" .
        "ORDER BY `Clients`.`ID` DESC ".
        "LIMIT " . (empty($_POST['offset']) ? "0" : $_POST['offset']) . ",50");
}
if(!empty($rows)) {
    foreach($rows as $register) :
        $tags = $db->receiveQuery("SELECT `Tags`.`Name`,`Tags`.`ID` FROM `Tags`" .
            "RIGHT JOIN `ClientToTag`" .
            "ON `ClientToTag`.`TagID` = `Tags`.`ID`" .
            "WHERE `ClientToTag`.`ClientID` = " . $register['ID']);
        ?>
        <div class="registerCollection clearfix<?= $register['checked'] == 1 ? '' : ' unchecked' ?>" data-name="<?= strtolower($register['CallName'] . "_" . $register['Name']) ?>" style="display: none;" data-tags="<?php foreach($tags as $tag) { echo strtolower($tag['Name'] . "_"); } ?>">
            <a href="?page=6&id=<?= $register['ID'] ?>" class="clearfix">
                <div class="registerName"><?= ucfirst($register['Name']) ?>, <?= strtoupper($register['Initals']) ?></div>
            </a>

            <div class="tags">
                <?php
                foreach ($tags as $tag) :
                    ?>
                    <div class="tag" data-tag="<?= $tag['Name'] ?>">
                        <?= $tag['Name'] ?>
                    </div>
                <?php
                endforeach;

                ?>
            </div>

        </div>
    <?
    endforeach;
}
