<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    
    function __construct () {

    }

     public static function beginTransaction()
     {
          self::getConnectionResolver()->connection(DB_SETTINGS_NAME)->beginTransaction();
     }

     public static function commit()
     {
         self::getConnectionResolver()->connection(DB_SETTINGS_NAME)->commit();
     }

     public static function rollBack()
     {
         self::getConnectionResolver()->connection(DB_SETTINGS_NAME)->rollBack();
     }
}
