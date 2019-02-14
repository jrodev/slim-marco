<?php
namespace App\Controllers;

use Illuminate\Support\Facades\DB;
use App\Controller;

/**
 * Acciones para el Controlador Home
 */
class UbigeoController extends Controller
{

    public function index ($req, $resp, $args)
    {
        //var_dump($args); exit;
        // $format = $req->getQueryParam('format', '');
        $abrvubg = key_exists("tblubg", $args) ? $args["tblubg"] : false; // abrev. ubigeo
        $abrvcat = key_exists("tblcat", $args) ? $args["tblcat"] : false; // abrev. categoria
        $idcat   = key_exists("idcat", $args) ? $args["idcat"] : false;

        $resTbl = $this->getUbigeo($abrvubg, $abrvcat, $idcat);

        //if ($format == 'json') {
        return $resp->withJson($resTbl);
        //}
        //return $this->view->render($resp, 'views/upssups/index.twig', ['uppsUps'=>$uppsUps]);
    }

}
