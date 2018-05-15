<?php
$loadingSource = "tag";
require "includes/initialize.php";

$auth = new \moonconsultancy\Authentication\Authentication();
echo $auth->checkAuth();
if($auth->Authenticated === false) {
    echo "Please don't try that. That would suck, if you did that. Really. A lot.";
    exit;
}

if($_POST['execution'] == "add") {
    if($db->executeQuery("INSERT INTO `Tags` (`Name`) VALUES ('" . $_POST['tagName'] . "');")) {
        ?>
        <div class='formItem'><?= $_POST['tagName'] ?> is succesvol toegevoegd. De pagina word zo herladen.</div>
        <meta http-equiv="refresh" content="2; URL=?page=7">
        <?php
    }
} elseif($_POST['execution'] == "deleteRequest") {
    ?>
    <div class="error">
        <div>Weet u zeker dat u deze hulpvorm wilt verwijderen?</div>
        <div class="formItem"><input id="delete" type="button" value="verwijderen"></div>
    </div>
    <script>
        $("#delete").click(function() {
            $.ajax({
                url: "tag.php",
                method: "POST",
                data: {
                    execution: "delete",
                    tagID: <?= $_POST['tagID'] ?>
                },
                dataType: "html"
            })
                .done(function(html) {
                    $("#ajaxResponse").html(html);
                });
        });
    </script>
    <?php
} elseif ($_POST['execution'] == "delete") {
    if($db->executeQuery("DELETE FROM `Tags` WHERE `ID` = " . $_POST['tagID'] . ";") && $db->executeQuery("DELETE FROM `ClientToTag` WHERE `tagID` = " . $_POST['tagID'])) {
        ?>
        <div class='formItem' id="deletedMessage">Product <?= $_POST['tagID'] ?> is succesvol verwijderd.</div>
        <script>
            $('.tagSelection#<?= $_POST['tagID'] ?>').remove();
            setTimeout(function() {
                $("#ajaxResponse").animate({
                    opacity: 0,
                    duration: 300,
                    complete: function() {
                        $(this)
                            .empty()
                            .css("opacity",1)
                            .html("");
                    }
                });
            }, 4000)
        </script>
        <?php
    }
}

if (isset($error)) : ?>
    <div class="error"><?= $error; ?></div>
<?php endif; ?>