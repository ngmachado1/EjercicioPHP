<?php
class DB{
  public static function conexion(){
    $host="localhost";
    $nombre_db="database";
    $usuario="root";
    $contraseña="suizoargentina";
    
      try{
        $conexionPDO = new PDO('mysql:host='. $host .';dbname='. $nombre_db .';charset=utf8' , $usuario, $contraseña);
        return $conexionPDO;
      }catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
      }
    
  }
}

?>