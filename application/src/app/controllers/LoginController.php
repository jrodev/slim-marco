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
        session_start();
        $arrResp = $_SESSION["sessErr"] ? $_SESSION["sessErr"] : null;
        if ($_SESSION["islogin"]) {
            return $resp->withRedirect('/establecimientos/nuevo', 302);
        };

        return $this->render($resp, 'login/index.twig', ['arrResp'=>$arrResp]);
    }

    public function post ($req, $resp, $args)
    {
        session_start();

        $input = $req->getParsedBody();
        $arrResp = array();
        $urlRedirect = '/login'; // Si no hay sesion se regresa al login
        $_SESSION["islogin"] = false; // Inicializando
        // Si usuario y password correcto
        if($input['login'] == "admin" && $input['password'] == "123456") {
            $_SESSION["islogin"] = true;
            $_SESSION["sessErr"] = array("session"=>0,"msg"=>"Usuario o password incorrecto!");
            $urlRedirect = '/establecimientos/nuevo';
        }
        // Else : Error Login
        //return $this->response->withJson($arrResp);
        return $resp->withRedirect($urlRedirect, 302);
        //return $this->render($resp, 'login/index.twig', ['arrResp'=>$arrResp]);
    }

}
