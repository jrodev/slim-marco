<?php
namespace App\Models;
use App\Model;

class AtributoEstablecimiento extends Model {

    protected $connection = DB_SETTINGS_NAME; //"db_casa_local_oniees"; // "db_trab_vagrant_oniees";

    protected $table = 'atributo_establecimiento';

    //protected $fillable = array('establecimiento_id','atributo_id','seleccionado');

    public $timestamps = false;
}
