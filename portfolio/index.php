<!DOCTYPE html>
<?php
require_once "includes/initialize.php";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= WEBPAGE_TITLE ?></title>

    <!-- Library CSS files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS files -->
    <link href="css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header"><!-- .navbar-header -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= HOME_PAGE ?>">Portfolio</a>
                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><!-- .navbar-collapse -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= MAIN_SITE ?>">Max Winsemius</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3" id="articles-nav">
                <?php
                foreach ($articles->getArticlesList() as $article) :
                    ?>

                <div class="article-thumbnail thumbnail<?= $article['UnderConstruction'] == 1 ? "
                under-construction" : "" ?><?= $article['OldVersion'] == 1 ? " old-version" : "" ?>" id="article-<?= 
                $article['ID'] ?>">
                    <img src="<?= $article['ImageLink'] ?>">
                    <div class="caption">
                        <h3><?= $article['Title'] ?></h3>
                    </div>
                </div>
                <?php
                endforeach;
                ?>

            </div>
            <div class="col-xs-0 col-sm-9" id="articles-container">
                <div class="col-sm-12 article">
                    <h1 id="article-title"></h1>
                    <div id="article-info"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Library JS files -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom JS files -->
    <script src="js/main.js"></script>
</body>
</html>