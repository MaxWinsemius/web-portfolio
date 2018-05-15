<?php
//Define custom constants to use with project
//database
define("DB_HOST", "");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");
define("DB_DBNAME", "");

//paths
define("PAGE_PATH", "includes/pages/");
define("DATA_PATH", "includes/Data/");

//color register css
define("WARNING_BORDER","solid 1px #f2c779");
define("ERROR_BORDER","solid 2px #EC4C3F");
define("WARNING_BOTTOM_BORDER","solid 3px #f2c779");

//Login Credentials
define("ADMIN_USERNAME","Wihoo");
define("ADMIN_PASSWORD","Test");

//Mail to send notifications to and reply to
define("MAIL_DEFAULT","");

//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});
