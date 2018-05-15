<?php
$loadingSource = "index";
require "includes/initialize.php";
?>
<!doctype html>
<html>
<head>
    <title><?= $pages->getTitle(); ?></title>
    <meta name="description" content="Moonconsultancy appointment creater"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.color-2.1.2.min.js"></script>
</head>
<body>
<?php if (isset($error)) : ?>
    <div class="error"><?= $error; ?></div>
<?php endif; ?>
<div class="wrapper">
    <div class="content">
        <?php $pages->getPage(); ?>
    </div>
</div>
</body>
</html>