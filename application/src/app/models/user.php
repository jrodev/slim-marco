<?php
namespace App\Models;
//use \Illuminate\Database\Eloquent\Model;
use App\Model;
class User extends Model {
    //protected $connection = "db_trab_vagrant_eloquent";//"db_casa_local_eloquent";
    protected $table = 'users';
    protected $fillable = ['username','email','password'];
}
