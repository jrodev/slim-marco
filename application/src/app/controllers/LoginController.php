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
        $arrResp = array();

        if($input['login'] == "admin" && $input['password'] == "123456") {
            session_start();
            $_SESSION["islogin"] = 1;
            $arrResp = array("session"=>true,"msg"=>"Acceso Autorizado!");
        } else {
            $arrResp = array("session"=>false,"msg"=>"acceso denegado!!!");
        }

        //return $this->response->withJson($arrResp);
        return $this->render($resp, 'login/index.twig', ['arrResp'=>$arrResp]);
    }

}
