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
            foreach ($stm as $key => $value) {
               $password = $value["Pass"];
            }
            if (password_verify($Pass, $password)) {
                $cantidad_resultado = $stm->fetchColumn();
                session_start();
                if ($cantidad_resultado == "1") {                
                    $_SESSION["Correo"] = $Correo;
                    $_SESSION["Pass"] = $Pass;
                    
                } else {
                    $_SESSION["error"] = "ERROR";
                }
    
            }else{
                print_r("contraseña incorrecta");
            }
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
