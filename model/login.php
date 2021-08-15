<?php
class Login
{
    private $conexionPDO;

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

    public function ValidarDatos($Correo, $Pass)
    {
        try {
            // Consulta
            $sql = "SELECT * FROM usuario WHERE Correo = :correo";

            $stm = $this->conexionPDO->prepare($sql);
            $stm->execute([
                ":correo" => $Correo
            ]);

            $arr = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (isset($arr[0]["Pass"])) {
                $password = $arr[0]["Pass"];

                if (password_verify($Pass, $password)) {
                    $_SESSION["Correo"] = $Correo;
                    $_SESSION["Pass"] = $Pass;
                }
            } else {
                print_r("por favor, ingrese un usuario y contraseña validos");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
