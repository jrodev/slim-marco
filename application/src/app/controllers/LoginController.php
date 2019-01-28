<?php
namespace App\Controllers;

use App\Controller;

/**
 * Acciones para el Controlador Home
 */
class LoginController extends Controller
{

    public function index ($req, $resp, $args)
    {

        //d($user);
        return $this->render($resp, 'login/index.twig');
    }

    public function post ($request, $response, $args) {
        $input = $request->getParsedBody();
        if($input['usuario'] == "admin" && $input['clave'] == "123456") {
            session_start();
            $_SESSION["islogin"] = 1;
            return $this->response->withJson(array("status"=>1,"msg"=>"Acceso Autorizado!"));
        } else {
            return $this->response->withJson(array("status"=>1,"msg"=>"acceso negado"));
        }
    }

}
