<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Cargando motor de plantillas twig
$container['view'] = function ($c) {
    //nos indica el directorio donde están las plantillas
    $settings = $c->get('settings');
    $rendered = $settings['renderer'];
    // puede ser false o el directorio donde se guardará la cache
    $view = new Slim\Views\Twig($rendered['template_path'], ['cache' => false]);

    // Vie Helpers
    $twig = $view->getEnvironment();

    // Variable Global
    $twig->addGlobal('twigGlobalVar', 'Hi Global Var!');

    // Funcion Helper
    $twig->addFunction(
        new Twig_Function(
            "baseUrl",
            function ($all=FALSE) use ($settings) {
                $strBaseUrl = sprintf(
                    "%s://%s%s",
                    ( $settings['env']=='production' || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off') ) ? 'https' : 'http',
                    $_SERVER['HTTP_HOST'],
                    $all ? $_SERVER['REQUEST_URI'] : "/"
                );
                return $strBaseUrl;
            }
        )
    );

    // Function get Socket Url
    $twig->addFunction(new Twig_SimpleFunction("socketUrl", function () use ($settings) {
        $socketUrl = $settings['socket-url'];
        return $socketUrl;
    }));

    // instancia y añade la extensión especifica de slim
    $basePath =  rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');

    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
    return $view;
};

// Cargando libreria para cargar JSON
$container['loadJson'] = function ($c) {
	$jsonPath = $c->get('settings')['jsonPath'];
    $capsule = new Libs\DataLoader($jsonPath);
    return $capsule;
};

//!d($container['settings']); exit;
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['settings']['db_trab_vagrant_eloquent']);
$capsule->addConnection($container['settings']['db_casa_local_eloquent'], 'db_casa_local_eloquent');
$capsule->addConnection($container['settings']['db_casa_local_oniees'], 'db_casa_local_oniees');
$capsule->addConnection($container['settings']['db_trab_vagrant_oniees'], 'db_trab_vagrant_oniees');
$capsule->addConnection($container['settings']['db_host_jrodevworks_oniees'], 'db_host_jrodevworks_oniees');

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {

    return $capsule;
};

// Agregegando Controller
/*
$fileList = glob('test/*');

//Loop through the array that glob returned.
foreach($fileList as $filename){
   //Simply print them out onto the screen.
   echo $filename, '<br>';
}
*/
/*
$container['MenuController'] = function ($c) {
	return new App\Controllers\MenuController($c['view'], $c['router'], $c['loadJson']);
};

$container['CocinaController'] = function ($c) {
	return new App\Controllers\CocinaController($c['view'], $c['router'], $c['loadJson']);
};*/
$container['IndexController'] = function ($c) {
    $settings = $c->get('settings');
	return new App\Controllers\Test\IndexController($settings, $c['view'], $c['router']);
};

$container['LoginController'] = function ($c) {
    $settings = $c->get('settings');
	return new App\Controllers\LoginController($settings, $c['view'], $c['router'], $c['db']);
};

$container['EstablecimientoController'] = function ($c) {
    $settings = $c->get('settings');
	return new App\Controllers\EstablecimientoController($settings, $c['view'], $c['router'], $c['db']);
};

$container['UpssupsController'] = function ($c) {
    $settings = $c->get('settings');
	return new App\Controllers\UpssupsController($settings, $c['view'], $c['router'], $c['db']);
};

$container['UbigeoController'] = function ($c) {
    $settings = $c->get('settings');
	return new App\Controllers\UbigeoController($settings, $c['view'], $c['router'], $c['db']);
};
