<?php


class usuario
{
    private $conexionPDO;

    public $id;
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Pass;

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
            //buscar usuario en la base de datos?
            $stm = $this->conexionPDO->prepare("SELECT * FROM usuario WHERE Correo = :correo");
            $stm->execute([
                ":correo" => $data->Correo,
            ]);
            //el usuario ya existe?
            $arr = $stm->fetchAll(PDO::FETCH_ASSOC);
            var_dump($arr);
            if (isset($arr[0]["Correo"])){
                $_SESSION["err"] = "usuario ya existe";

            }else{
                // registrar usuario en base de datos
                $sql = "INSERT INTO usuario (Nombre, Apellido, Correo, Pass) VALUES (?,?,?,?)";
                $this->conexionPDO->prepare($sql)
                    ->execute(
                    [
                        $data->Nombre,
                        $data->Apellido,
                        $data->Correo,
                        $data->Pass,
                    ]
                    );
            }

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
                            Pass = ?			
                    WHERE id = ?";

            $this->conexionPDO->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Correo,
                        $data->Pass,
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
