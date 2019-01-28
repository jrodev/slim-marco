<?php
// Example 1
/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/
//var_dump(\App\Controllers\Test\IndexController::class);
//
//
/* // Example 2
$app->group('/users/{id:[0-9]+}', function (App $app) {
    $app->map(['GET', 'DELETE', 'PATCH', 'PUT'], '', function ($request, $response, $args) {
        // Find, delete, patch or replace user identified by $args['id']
    })->setName('user');

    $app->get('/establecimiento[/index[/]]', 'EstablecimientoController:index');

    $app->get('/reset-password', function ($request, $response, $args) {
        // Route for /users/{id:[0-9]+}/reset-password
        // Reset the password for user identified by $args['id']
    })->setName('user-password-reset');
});*/

// Routes
$app->group('/establecimientos', function () {

    $this->get('[/[index[/[{page}[/{perpage}]]]]]', 'EstablecimientoController:index')->setName('listar-establecimientos'); // Listar

    $this->get('/nuevo[/]', 'EstablecimientoController:nuevo');

    $this->post('[/guardar[/]]', 'EstablecimientoController:guardar');

    $this->get('/migrar[/]', 'EstablecimientoController:migrar');

    $this->group('/{id}', function () {

        $this->get('[/ver[/]]', 'EstablecimientoController:ver');

        $this->put('[/actualizar[/]]', 'App\controllers\EventController:actualizar');

        $this->delete('[/eliminar[/]]', 'App\controllers\EventController:eliminar');

    });
});

$app->group('/upssups', function () {
    $this->get('[/[cat/{idcat}[/]]]', 'UpssupsController:index')->setName('listar-upssups'); // Listar
});

// Ruteando site antiguo
$app->get('[/[{page_name}]]', function($req, $resp, $args) use($app){
    $container = $app->getContainer();
    $renderer = new Slim\Views\PhpRenderer(__DIR__."/../../resources/site/public/");
    //$phpFile = __DIR__."/../../resource/site/public/about.php";
    $fileName = "/index.php";
    if (key_exists('page_name', $args)) {
        $fileName = "/{$args["page_name"]}.php";
    }
    $renderer->render($resp, $fileName);
});

$app->group('/login', function () {
    $this->get('[/index[/]]', 'LoginController:index');
    $this->post('[/post[/]]', 'LoginController:post');
});

//$app->get('/test[/[index[/]]]', \App\Controllers\Test\IndexController::class.":index");

//$app->get('[/[home[/index[/]]]]', 'HomeController:index');
