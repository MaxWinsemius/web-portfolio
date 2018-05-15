<?php
require_once "includes/initialize.php";
?>
<!doctype html public>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <?= $files->getCurrentCss() ?>

  <title><?= $files->getCurrentPagetitle() ?></title>

</head>
<body>
	<div class="wrapper">
		<?php $files->getCurrentContent() ?>
	</div>

	<?= $files->getCurrentJs() ?>
</body>
</html>
