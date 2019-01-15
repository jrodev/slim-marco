<?php
namespace App\Controllers\Test;

//use App\Controller;
use Libs\ChangeString;
use Libs\CompleteRange;
use Libs\ClearPar;

use App\Models\Test\User;

use App\Controller as BaseCtrl;
/**
 * Acciones para el Controlador Home
 */
class IndexController extends BaseCtrl
{

    public function index($req, $resp, $args)
    {
        //d($GLOBALS); exit;
        //d($req, $resp, $args); //exit;
        $user = User::create(['username'=>'Jose ramos','email'=>'jramos@jramos.com','password'=>'88wq877wq7']);

        return $this->render($resp, 'index/index.twig');
    }

}
