<?php
//Define custom constants to use with project
//database
define("DB_HOST", "db.maxwinsemius.com");
define("DB_USERNAME", "md268266db312107");
define("DB_PASSWORD", "oGN8K9j5");
define("DB_DBNAME", "md268266db312107");

//links
define("MAIN_SITE", "http://www.maxwinsemius.com");
define("HOME_PAGE", MAIN_SITE . "/portfolio");
define("WEBPAGE_TITLE", "Portfolio || Max Winsemius");


//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});