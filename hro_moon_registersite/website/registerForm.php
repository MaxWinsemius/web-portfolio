<?php
$loadingSource = "register";
require "includes/initialize.php";
$register = new \moonconsultancy\Authentication\Register();
if (isset($error)) : ?>
    <div class="error"><?= $error; ?></div>
<?php endif; ?>

<input type="hidden" name="filled" value="true">
<script>
    <?= $register->checkData();

    if($register->finish) {
            $db->clientRegister($register);
    }
    ?>
</script>
<?= $register->finish ? '<meta http-equiv="refresh" content="0; url=?page=1" />' : '' ?>