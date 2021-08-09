<?php


class usuario
{
    private $conexionPDO;

    public $id;
    public $Nombre;
    public $Apellido;
    public $Correo;

    public function __CONSTRUCT()
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
            $sql = "INSERT INTO usuario (Nombre, Apellido, Correo) VALUES (?,?,?)";
            $this->conexionPDO->prepare($sql)
                ->execute(
                array(
                    $data->Nombre,
                    $data->Apellido,
                    $data->Correo
                    )
                );
        } catch (Exception $e) 
        {
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
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE  usuario SET 
                            Nombre = ?, 
                            Apellido = ?,
                            Correo = ?,				
                    WHERE id = ?";

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
        try {
            $stm = $this->conexionPDO
                ->prepare("DELETE FROM usuario WHERE id = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Obtener($id)
    {
        try {
            $stm = $this->conexionPDO
                ->prepare("SELECT * FROM usuario WHERE id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
