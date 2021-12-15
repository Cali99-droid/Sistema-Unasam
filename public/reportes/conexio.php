<?php

class BDConexion {
   public static $instancia = null;

   public static function crearInstancia() {
      if(!isset(self::$instancia)) {
         $opcionesPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
         self::$instancia = new PDO('mysql:host=127.0.0.1:3306;dbname=app_unasam','root','root',$opcionesPDO);
         //self::$instancia = new PDO('mysql:host=127.0.0.1;dbname=jymsystemsoft_app_unasam', 'jymsystemsoft_jymsoft', 'sdkj384SK34sn', $opcionesPDO);
      }
      return self::$instancia;
   }
}
