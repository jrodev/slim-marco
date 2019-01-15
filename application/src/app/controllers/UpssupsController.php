<?php
namespace App\Controllers;

use Illuminate\Support\Facades\DB;
use App\Controller;
/**
 * Acciones para el Controlador Home
 */
class UpssupsController extends Controller
{

    public function index ($req, $resp, $args)
    {
        //$aFoods = $this->dataLoader->load('foods'); //exit;
        $format = $req->getQueryParam('format', '');
        $catego = key_exists("idcat",$args)?$args["idcat"]:false;

        // Listado de Categorias UpssUps
        $db = $this->db;
        $db = $db::connection(DB_SETTINGS_NAME); //  'db_casa_local_oniees'

        $uu = 'upss_ups';
        ///$query = $db->table($cat)->where('activo','=','1');
        $query = $db->table($uu)->select("$uu.id", "$uu.nombre")->where('activo','=','1');//->toSql()

        if($catego) { $query->where('categoria_upssups_id','=',$catego); }

        $uppsUps = $query->get()->all();

        if ($format == 'json') {
            return $resp->withJson($uppsUps);
        }

        return $this->view->render($resp, 'views/upssups/index.twig', ['uppsUps'=>$uppsUps]);
    }

}
