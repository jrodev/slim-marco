<?php
namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use Interop\Container\ContainerInterface;

use App\Controller;

use App\Models\Establecimiento;
/**
 * Acciones para el Controlador Home
 */
class EstablecimientoController extends Controller
{
    /*
    protected $ci;
    public function __construct(ContainerInterface $ci) {
       $this->ci = $ci;
    }
    */
    public function index ($req, $resp, $args)
    {
        var_dump($args);
        $db = $this->db;
        $db = $db::connection(DB_SETTINGS_NAME); //  'db_casa_local_oniees'
        //!d($db); exit;
        //$aFoods = $this->dataLoader->load('foods'); //exit;

        // Tablas
        $a = 'atributo';
        $ta = 'tipo_atributo';
        $esp = 'especialidad';
        $query = $db->table($a)
                    ->join($ta, "$ta.id", '=', "$a.tipo_atributo_id")
                    ->select(
                        $db->raw("$ta.id idTipo"), $db->raw("$ta.nombre nomTipo"),
                        "$a.nombre", $db->raw("concat($ta.abrev,'_',$a.abrev) as inp_name")
                    )//->toSql()
        ;
        // Agrupando para adecuadamente para usar en el foreach de la plantilla
        $attrs = $query->get()->groupBy(['idTipo','nomTipo'])->all();

        // Listado de Especialidades
        $query = $db->table($esp)->where('activo','=','1');
        $esps = $query->get()->all();

        // Listado de Categorias UpssUps
        $cuu = 'categoria_upssups';
        $uu = 'upss_ups';
        ///$query = $db->table($cat)->where('activo','=','1');
        $query = $db->table($cuu)
                    ->join($uu, "$uu.categoria_upssups_id", '=', "$cuu.id")
                    ->select("$cuu.id", "$cuu.nombre", "$uu.ambiente")//->toSql()
                    ->groupBy("id")
        ;
        $catUppsUps = $query->get()->all();
        //$catUpss = $query->where('ambiente','=','1')->get()->all();
        //$catUps  = $query->where('ambiente','=','2')->get()->all();

        !d($query->toSql(),$catUppsUps);

        //var_dump($attrs);
        //!d($query->toSql(), $attrs); exit;
        /*
        //pls validate that are numbers
        $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $offset = (--$page) * $limit; //calculate what data you want
        //page 1 -> 0 * 10 -> get data from row 0 (first entry) to row 9
        //page 2 -> 1 * 10 -> get data from row 10 to row 19

        $countQuery = $stmt->prepare('SELECT COUNT(*) FROM table');
        $dataQuery = $stmt->prepare('SELECT * FROM table LIMIT :limit OFFSET :offset');
        $dataQuery->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $dataQuery->bindValue(':offset', $offset, \PDO::PARAM_INT);

        try {
            $count = $countQuery->execute();
            $data = $dataQuery->execute();
        } catch(PDOException $e) {
            die('Error.');
        }
        $app->render('data.html', array(
            'data' => $data,
            'count' => $count
        ));*/

        return $this->render(
            $resp,
            'establecimiento/index.twig',
            ['attrs'=>$attrs, 'esps'=>$esps, 'catUppsUps'=>$catUppsUps]
        );
    }

    public function guardar ($req, $resp, $args) {
        try {
            \App\Model::beginTransaction();
            $establecimiento = new Establecimiento;
            $postData = $req->getParsedBody();
            $fieldsExclude = array('region_id', 'departamento_id', 'provincia_id');

            foreach ($postData as $col=>$val) {
                if(in_array($col,$fieldsExclude)) continue;
                if (trim($val)) { $establecimiento[$col] = $val; }
            }

            $establecimiento->save();
            //$establecimiento = Establecimiento::create();   //!d($user->id,$user);
            \App\Model::commit();
            $data = array("status"=>1, "post"=>$establecimiento, "args"=>$args, "msg"=>"Se guardo Establecimiento!");
        } catch (Exception $ex) {
            \App\Model::rollBack();
            return $resp->withJson(array("status"=>1, "msg"=>$ex->getMessage()));
        }

        return $resp->withJson($data);
    }

}
