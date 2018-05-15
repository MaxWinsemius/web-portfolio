<?php
$loadingSource = "login";
require_once "includes/initialize.php";
$auth = new \moonconsultancy\Authentication\Authentication();
if (isset($error)) : ?>
    <div class="error"><?= $error; ?></div>
<?php endif; ?>

<?= $auth->checkLogin() ?>