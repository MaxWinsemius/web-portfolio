<?php
$loadingSource = "appointment";
require "includes/initialize.php";

if (isset($error)) : ?>
    <div class="error"><?= $error; ?></div>
<?php endif;
$db->addAppointment();
$db->insertTags();
?>
<meta http-equiv="refresh" content="0; url=?page=2" />