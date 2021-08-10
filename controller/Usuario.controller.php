<?php
session_start();
require_once 'model/usuario.php';
require_once 'model/login.php';
class usuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
 
        if(isset($_SESSION["Correo"])){
            require_once 'view/usuario/usuario.php';
        }else{
            require_once 'view/usuario/usuario-login.php';
        }
       
    }
    public function Login(){
        if (isset($_REQUEST["Correo"]) && isset($_REQUEST["Pass"])) {

            $validar = new Login();
            $validar->ValidarDatos($_REQUEST["Correo"], $_REQUEST["Pass"]);
            if (isset($_SESSION["Correo"])){
                header('Location: index.php');
            }
            
        } else {
           var_dump('error');
           die;
        }
    }
    public function Logout(){
        if (isset($_SESSION["Correo"])){

            $_SESSION = [];

            session_destroy();
        }
        header('Location: index.php');
    }

    public function Crud(){
        $usuario = new usuario();
        
        if(isset($_REQUEST['id'])){
            $usuario = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        
    }
    
    public function Guardar(){
        $usuario = new usuario();
        
        $usuario->id = $_REQUEST['id'];
        $usuario->Nombre = $_REQUEST['Nombre'];
        $usuario->Apellido = $_REQUEST['Apellido'];
        $usuario->Correo = $_REQUEST['Correo'];  
        $usuario->Pass = password_hash($_REQUEST['Pass'], PASSWORD_BCRYPT);  
        $usuario->id > 0 
            ? $this->model->Actualizar($usuario)
            : $this->model->Crear($usuario);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}