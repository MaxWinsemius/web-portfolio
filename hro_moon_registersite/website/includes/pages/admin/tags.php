<?php
$loadingSource = "admin";
require "includes/initialize.php";
require "includes/utils/header.php";
?>
<div class="pageHeader">
    Hulpvormen
</div>

<div class="formSpace"></div>

<h3>Verwijderen</h3>
<?php
$rows = $db->receiveQuery('SELECT `Name`,`ID` FROM `Tags`');
foreach ($rows as $row) {
    ?>
    <div class="formItem tagSelection" id="<?= $row['ID'] ?>"><?= $row['Name'] ?></div>
    <?php
}
?>

<div class="formSpace"></div>

<h3>Toevoegen</h3>
<div class="formItem"><input id="add" type="text" name="name" placeholder="Naam"></div>
<div class="formItem"><input id="addSubm" type="button" value="Toevoegen"></div>

<div id="ajaxResponse"></div>

<script>
    $('.tagSelection').click(function (event) {
        $.ajax({
            url: "tag.php",
            method: "POST",
            data: {
                execution: "deleteRequest",
                tagID: event.target.id
            },
            dataType: "html"
        })
            .done(function(html) {
                $("#ajaxResponse").html(html);
            });
    });

    $('#addSubm').click(function () {
        if(!$('#add').val()) {
            alert("Niets ingevuld");
        } else {
            $.ajax({
                url: "tag.php",
                method: "POST",
                data: {
                    execution: "add",
                    tagName: $("input[type='text']").val()
                },
                dataType: "html"
            })
                .done(function (html) {
                    $("#ajaxResponse").html(html);
                });
        }
    });
</script>