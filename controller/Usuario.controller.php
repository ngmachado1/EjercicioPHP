<?php
require_once 'model/usuario.php';
class usuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
       
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