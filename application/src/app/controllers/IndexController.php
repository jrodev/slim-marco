<?php
namespace App\Controllers;

use App\Controller;
use Libs\ChangeString;
use Libs\CompleteRange;
use Libs\ClearPar;

use App\Models\User;
/**
 * Acciones para el Controlador Home
 */
class IndexController extends Controller
{

    public function index($req, $resp, $args)
    {
        //d($GLOBALS); exit;
        //d($req, $resp, $args); //exit;
        /*\App\Model::beginTransaction();
        $user = User::create(['username'=>'Jose ramos','email'=>'jramos@jramos.com','password'=>'88wq877wq7']);
        !d($user->id,$user);
        \App\Model::commit();*/
        //\App\Model::rollBack();

        //d($user);
        return $this->render($resp, 'index/index.twig');
    }

}
