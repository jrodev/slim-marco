<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$mwLogin = function ($request, $response, $next) {

    session_start();

    if (!$_SESSION['islogin']) {
        return $response->withRedirect($this->router->pathFor('login'), 403);
    }

    $response = $next($request, $response);

    return $response;
};
