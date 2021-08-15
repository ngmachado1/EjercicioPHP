<?php 
class DB
{
    public static function conexion()
    {
        
        $host = "localhost";
        $nombre_db = "usuarios";
        $usuario = "root";
        $contraseña = "";

        $conexionPDO = new PDO('mysql:host=' . $host . ';dbname=' . $nombre_db . ';charset=utf8', $usuario, $contraseña);
        $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexionPDO;
    }
}
?>