<?php

class DB
{
    public static function conexion()
    {
        $host = "localhost";
        $nombre_db = "database";
        $usuario = "root";
        $contraseña = "suizoargentina";

        $conexionPDO = new PDO('mysql:host=' . $host . ';dbname=' . $nombre_db . ';charset=utf8', $usuario, $contraseña);
        return $conexionPDO;
    }
}

class usuario
{
    public $id;
    public $Nombre;
    public $Apellido;
    public $Correo;

    public function __construct()
    {
        try {
            $this->conexionPDO = DB::conexion();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Crear(usuario $data)
    {
        try {
            $sql = "INSERT INTO usuario (Nombre, Apellido, Correo) VALUES (?,?,?,?)";
            $this->conexionPDO->prepare($sql)->execute(
                [
                    $data->Nombre,
                    $data->Apellido,
                    $data->Correo
                ]
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar()
    {
        try {
            $result = [];

            $stm = $this->conexionPDO->prepare("SELECT * FROM usuario");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function update($data)
    {
        try {
            $sql = "UPDATE  usuario SET 
                            Nombre = ?, 
                            Apellido = ?,
                            Correo = ?,				
				    WHERE   id = ?";

            $this->conexionPDO->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Correo,
                        $data->id
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Eliminar($id)
	{
		try 
		{
			$stm = $this->conexionPDO
			            ->prepare("DELETE FROM usuario WHERE id = ?");
			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
