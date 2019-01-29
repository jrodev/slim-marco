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

    public function post ($req, $resp, $args) {

        $input = $req->getParsedBody();
        $arrResp = array();

        if($input['login'] == "admin" && $input['password'] == "123456") {
            session_start();
            $_SESSION["islogin"] = 1;
            $arrResp = array("session"=>1,"msg"=>"Acceso Autorizado!");
            return $resp->withRedirect('/establecimientos/nuevo', 200);
        } else {
            $arrResp = array("session"=>0,"msg"=>"acceso denegado!!!");
        }

        //return $this->response->withJson($arrResp);
        return $this->render($resp, 'login/index.twig', ['arrResp'=>$arrResp]);
    }

}
