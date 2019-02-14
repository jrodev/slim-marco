<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

//session_start();
//phpinfo(); exit;
// ----------------------------------------------------------------------------------------
/*
set_exception_handler(function($e) {
    error_log($e->getMessage());
    d($e->getMessage());
    // if "no driver" add mysql pdo php.ini
    exit('Something weird happened'); //something a user can understand
});
$dsn = "mysql:host=localhost;dbname=php-app-med;charset=utf8";
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];

$GLOBALS["DB"] = new PDO($dsn, "root", "123456", $options);
//d($GLOBALS["DB"]);
$role = \Libs\Roles\Role::getRolePerms(2);

exit;*/
// ----------------------------------------------------------------------------------------

define("DB_SETTINGS_NAME", "db_casa_local_oniees"/*"db_trab_vagrant_oniees"*/);

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
