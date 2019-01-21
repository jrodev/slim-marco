<?php
namespace App\Models;
use App\Model;

class PersonalEspecialidad extends Model {

    protected $connection = DB_SETTINGS_NAME; //"db_casa_local_oniees"; // "db_trab_vagrant_oniees";

    protected $table = 'personal_especialidad';

    //protected $fillable = array(
    //    'codigo','nombre','direccion','categoria_id',/*'region_id','departamento_id','provincia_id',*/'distrito_id'
    //);

    public $timestamps = false;
}
