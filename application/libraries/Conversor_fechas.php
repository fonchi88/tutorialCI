<?php
defined('BASEPATH') OR exit('No direct script access allowed');
///////////////////////////////////////////////////////
//Libreria creada para seguir tutorial desarrollo web//
//////////////////////////////////////////////////////

class Conversor_fechas{
   
   ////////////////////////////////////////////////////
   //Convierte fecha de mysql a español
   ////////////////////////////////////////////////////
   public function fecha_mysql_a_espanol($fecha){
      preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/", $fecha, $mifecha);
      $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
      return $lafecha;
   }

   ////////////////////////////////////////////////////
   //Convierte fecha de español a mysql
   ////////////////////////////////////////////////////
   public function fecha_espanol_a_mysql($fecha){
      preg_match( "/([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})/", $fecha, $mifecha);
      $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
      return $lafecha;
   } 
   
}
?>