<?php
include_once ("../model/usuario_model.php");

$usuario= new usuario_model();
$usuario->setList();

$usuarios = $usuario->getList();

foreach ($usuarios as $object){
    if($object->getUsuario()==$_GET["user"] && $object->getContrasena()==$_GET["pass"]){
        session_start();       
        $_SESSION["usuario"] = $object->getUsuario();
        
        if($object->getAdmin()==1){
            echo "admin";
            header("Location: view/admin.php");
        }else {
            header("Location: CHotel.php");
        }
    }
}
?>