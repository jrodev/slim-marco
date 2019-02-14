<?php

namespace App;

class Controller
{

    protected $cnf; // Settings o Config
    protected $view;
    protected $router;
    protected $dataLoader = false;

    /**
     * La instanciación del controller se hace en dependencies.php
     * @param settings   $settings Variables configuracion
     * @param Twig       $view     Motor de plantillas
     * @param Routes     $router   Ruteo
     * @param DataLoader $loadJson Carga el archivo employees,json
     */
    public function __construct($settings, $view, $router, $db=false)
    {
        $this->cnf = $settings;
        $this->view = $view;
        $this->router = $router; //d($router);
        if($db) { $this->db = $db; }
    }

    public function render($resp, $view, $args = []) {

        //$pagesPath = $this->cnf['renderer']['template_path']."pages/".$view;
        //$pagesPath, no necesario! El contexto se define en la definicion de twig en dependencies.ph
        //d($pagesPath); exit;
        //$route = $req->getAttribute('route');
        //d($this->router); // $this->router <> $req->getAttribute('route')
        return $this->view->render($resp, "pages/".$view, $args);
    }

    /**
     * Obtiene los datos de ubigeo (dpto, prov y dist)
     * @param  string|boolean $abrvubg abreviatura de tabla ubigeo (dpto | prov | dist)
     * @param  string|boolean $abrvcat abreviatura de tabla categoria (dpto | prov | dist)
     * @param  string|boolean $idcat   El id de la categoria para condicionar los resultados
     * @return array          array de registros de tabla de ubigeo
     */
    protected function getUbigeo ($abrvubg=false, $abrvcat=false, $idcat=false)
    {

        // Tablas validas para Ubigeo
        $tblsUbg = array('dpto'=>'departamento', 'prov'=>'provincia', 'dist'=>'distrito');
        //var_dump($tblsUbg[0]); exit;
        // nombre de tabla a consultar
        $tblUbg = ($abrvubg && key_exists($abrvubg, $tblsUbg)) ? $tblsUbg[$abrvubg] : false;
        $tblCat = ($abrvcat && key_exists($abrvcat, $tblsUbg)) ? $tblsUbg[$abrvcat] : false;

        $resTbl = array(); // Resultado

        if ($tblUbg) {
            $db = $this->db;
            $db = $db::connection(DB_SETTINGS_NAME); //  'db_casa_local_oniees'

            ///$query = $db->table($cat)->where('activo','=','1');
            $query = $db->table($tblUbg)->select("*");
            if ($idcat && $tblCat) { $query->where("{$tblCat}_id",'=',$idcat); }//->toSql()
            //var_dump($query->toSql()); exit;
            $resTbl = $query->get()->all();
        }
        return $resTbl;
    }

    /*
    protected $ci;

    public function __construct($ci) {
        $this->ci = $ci;
        $this->ci->db;
        $this->flash = $ci->flash;
    }

    public function redirect($route) {
        header('Location: ' . $this->ci->router->pathFor($route), true, 302);
        die();
    }
    */
}
