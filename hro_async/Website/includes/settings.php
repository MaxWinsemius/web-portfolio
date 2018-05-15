<?php
//Debug settings
//ini_set('xdebug.var_display_max_depth', 5);
//ini_set('xdebug.var_display_max_children', 256);
//ini_set('xdebug.var_display_max_data', 1024);

//general site info
//part of title added to the end of the page title
define("MAIN_TITLE","");

//paths
define("CSS_PATH", "css/");
define("JS_PATH", "js/");
define("PAGES_PATH", "includes/pages/");
define("DATA_PATH","includes/data/");

define("HEADER_FILE", 0);
define("FOOTER_FILE", 1);
define("INDEX_FILE", 2);
define("NOT_FOUND_FILE", 3);

//Database info
define("DB_HOST","localhost");
define("DB_USERNAME","");
define("DB_PASSWORD","");
define("DB_DATABASE_NAME","");

//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});