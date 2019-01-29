<?php
namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use Interop\Container\ContainerInterface;

use App\Controller;

use App\Models\Establecimiento;
use App\Models\PersonalEspecialidad;
use App\Models\AmbienteUpssups;
use App\Models\AtributoEstablecimiento;
use App\Models\Atributo;
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
        $db = $this->db;
        $db = $db::connection(DB_SETTINGS_NAME);
        // Tablas
        $e    = 'establecimiento';
        $dist = 'distrito';
        $prov = 'provincia';
        $dep  = 'departamento';
        $cat  = 'categoria';

        $query1 = $db->table($e)
                    ->join($dist, "$dist.id", '=', "$e.distrito_id")
                    ->join($prov, "$prov.id", '=', "$dist.provincia_id")
                    ->join($dep , "$dep.id" , '=', "$prov.departamento_id")
                    ->join($cat , "$cat.id" , '=', "$e.categoria_id")
                    ->select(
                        $db->raw("$e.codigo"),
                        $db->raw("$e.nombre establecimiento"),
                        $db->raw("$cat.nombre categoria"),
                        $db->raw("$dep.nombre departamento"),
                        $db->raw("$prov.nombre provincia"),
                        $db->raw("$dist.nombre distrito"),
                        $db->raw("$e.direccion"),

                        $db->raw("$e.gral_aniomarcha 'Año Funcionamiento'"),
                        $db->raw("$e.gral_nrocamas 'N° Camas'"),

                        $db->raw("$e.geo_nropisosestabl 'N° Pisos'"),

                        $db->raw("($e.gral_inversionequip + $e.gral_inversionInfra) 'Inversión Total'"),
                        $db->raw("$e.geo_areaterreno 'Área de Terreno'"),
                        $db->raw("$e.geo_areaconstruida 'Área Construida'")
                    )->where("$e.activo",'=', 1);//->toSql()
        ;
        //!d($query->toSql()); exit;
        // Agrupando para adecuadamente para usar en el foreach de la plantilla
        $estabs = $query1->get()->all();
        $firstRow = json_decode(json_encode($estabs[0]), true);
        $cols = array_keys($firstRow);   //!d($cols); exit;

        $query2 = $db->table($e)->select(
            $db->raw("red_institucion 'Red Asistencial'"),
            $db->raw("nombre 'Establecimiento de Salud'"),
            $db->raw("conserv_arquitect 'Arquitectura'"),
            $db->raw("conserv_estruct 'Estructura'"),
            $db->raw("conserv_instaelect 'Instalaciones Eléctricas'"),
            $db->raw("conserv_instasanit 'Instalaciones Sanitarias'"),
            $db->raw(
                "round((
             		 conserv_arquitect+
         		     conserv_estruct+
                     conserv_instaelect+
                     conserv_instasanit
                 )/4 ) 'Estado General'"
            )
        );

        $estados = $query2->get()->all();
        $firstRow2 = json_decode(json_encode($estados[0]), true);
        $cols2 = array_keys($firstRow2);   //!d($query2->toSql()); exit;

        return $this->render(
            $resp,
            'establecimiento/index.twig',
            ['cols'=>$cols, 'cols2'=>$cols2, 'estabs'=>$estabs, 'estados'=>$estados]
        );
    }

    public function nuevo ($req, $resp, $args)
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
                        $db->raw("$a.nombre_atrib nombre"), $db->raw("concat($ta.abrev,'_',$a.abrev) as idVal"),
                        $db->raw("$a.id idAttr")
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

        //!d($query->toSql(),$catUppsUps);

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
            'establecimiento/nuevo.twig',
            ['attrs'=>$attrs, 'esps'=>$esps, 'catUppsUps'=>$catUppsUps]
        );
    }

    public function guardar ($req, $resp, $args) {
        try {
            // Modelos Involucrados en esta transaccion
            $establecimiento         = new Establecimiento;
            $personalEspecialidad    = new PersonalEspecialidad;
            $ambienteUpssups         = new AmbienteUpssups;
            $atributoEstablecimiento = new AtributoEstablecimiento;

            // Datos enviados por POST
            $postData = $req->getParsedBody();
            //var_dump($postData); exit;
            //return $resp->withJson($postData);
            // Armando Datos para guardar en tabla Establecimiento
            $fieldsExclude = array('region_id', 'departamento_id', 'provincia_id');
            if (key_exists("establecimiento", $postData))
                foreach ($postData["establecimiento"] as $col=>$val) {
                    if(in_array($col,$fieldsExclude)) continue;
                    if (trim($val)) { $establecimiento[$col] = $val; }
                }

            // iniciando Transaccion
            \App\Model::beginTransaction();
            $establecimiento->save();

            $ins = array("ins1"=>false,"ins2"=>false,"ins3"=>false);
            // Armando Datos para guardar en tabla personal_especialidad
            if (key_exists("personal_especialidad", $postData)) {
                $arrPersEspc = $this->getRowsForInserted(
                    $postData["personal_especialidad"], array("establecimiento_id"=>$establecimiento->id)
                );
                $ins["ins1"]=$personalEspecialidad->insert($arrPersEspc);
            }

            // Armando Datos para guardar en tabla ambiente_upssups
            if (key_exists("ambiente_upssups", $postData)) {
                $arrAmbUpssUps = $this->getRowsForInserted(
                    $postData["ambiente_upssups"], array("establecimiento_id"=>$establecimiento->id)
                );
                $ins["ins2"]=$ambienteUpssups->insert($arrAmbUpssUps);
            }

            // Armando Datos para guardar en tabla atributo_establecimiento
            if (key_exists("atributo_establecimiento", $postData)) {
                $arrAtribEstab = $this->getRowsForInserted(
                    $postData["atributo_establecimiento"], array("establecimiento_id"=>$establecimiento->id)
                );
                $ins["ins3"]=$atributoEstablecimiento->insert($arrAtribEstab);
            }

            // Armando Datos para guardar en tabla atributo
            if (key_exists("atributo", $postData)) {
                foreach ($postData["atributo"] as $row) {
                    $atributo = new Atributo;
                    $atributo->tipo_atributo_id = $row["tipo_atributo_id"];
                    $atributo->nombre_atrib     = $row["nombre_atrib"];
                    $atributo->save();

                    // Almacenando los atributos nuevos, ya insertados, en la tabla atributo_establecimiento
                    $postData["atributo_establecimiento"][] = array(
                        "atributo_id"=>$atributo->id, "seleccionado"=>1
                    );
                }

                // Armando Datos para guardar en tabla atributo_establecimiento
                $arrAtribEstab = $this->getRowsForInserted(
                    $postData["atributo_establecimiento"], array("establecimiento_id"=>$establecimiento->id)
                );
                $ins["ins3"]=$atributoEstablecimiento->insert($arrAtribEstab);
            }

            //$establecimiento = Establecimiento::create();   //!d($user->id,$user);
            //Terminando Transaccion
            \App\Model::commit();

            // Respuesta OK 200
            $data = array(
                "status"=>1, "post"=>$postData, "ins"=>$ins, "args"=>$args, "msg"=>"Se guardo Establecimiento!"
            );

        } catch (Exception $ex) {
            \App\Model::rollBack();
            return $resp->withJson(array( "status"=>1, "msg"=>$ex->getMessage(), "post"=>$postData ));
        }

        return $resp->withJson($data);
    }

    /* Obteniendos Datos que se an migrado a la BD, y se desean registrar en el sistema */
    public function migrar ($req, $resp, $args)
    {
        //$aFoods = $this->dataLoader->load('foods'); //exit;
        $codigo = $req->getQueryParam('codigo', '');
        //$catego = key_exists("idcat",$args)?$args["idcat"]:false;

        // Listado de Categorias UpssUps
        $db = $this->db;
        $db = $db::connection(DB_SETTINGS_NAME); //  'db_casa_local_oniees'

        $e = 'establecimiento';
        ///$query = $db->table($cat)->where('activo','=','1');
        $query = $db->table($e)->select("*")->where('codigo','=',$codigo); //->where('activo','=','1');//->toSql()

        $estabs = $query->get()->all();

        $activo = 0;
        if(count($estabs)){ $activo = $estabs[0]->activo; }

        $arrResp = array(
            'status' => 1,
            'exist'  => ($activo==1) ? 1 : 0 ,
            'activo' => $activo,
            'data'   => ($activo==2) ? $estabs : []
        );


        //if ($format == 'json') {
        return $resp->withJson($arrResp);
        //}

        //return $this->view->render($resp, 'views/upssups/index.twig', ['uppsUps'=>$uppsUps]);
    }

    /**
     * Construyendo Array de registros para insertar en tabla, asociadas con $fkId
     * @param array $arrRows Array de nuevos registros para una tabla especifica.
     * @param array $fkId ['fk_id'=>VAL] nombre de columna y valor del PkId la tabla principal ya insertada.
     * @param array $fieldsExclude columnas de cada row que no deberian insertarse
     * @return array Array listo para ser insertado con Model::insert(array()).
     */
    private function getRowsForInserted ($arrRows, $fkId=FALSE, $fieldsExclude=FALSE) {
        $arrPersEspc = array();
        foreach ($arrRows as $i => $row) {
            $newRow = array();
            if ($fkId) { $newRow[key($fkId)] = current($fkId); }
            foreach ($row as $col=>$val) {
                if ($fieldsExclude && in_array($col,$fieldsExclude)) continue;
                //if (trim($val)!=="") {
                    $newRow[$col] = $val;
                //}
            }
            $arrPersEspc[] = $newRow;
        }
        return $arrPersEspc;
    }

}
