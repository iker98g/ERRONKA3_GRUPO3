<?php
session_start();
include_once ("../model/usuarioModel.php");
include_once ("../model/habitacionModel.php");

$usuario= new usuarioModel();
$usuario->setList();

$usuarios = $usuario->getList();

foreach ($usuarios as $object){
    if($object->getUsuario()==$_GET["user"] && $object->getContrasena()==$_GET["pass"]){
               
        $_SESSION["usuario"] = $object->getUsuario();
        $_SESSION["id"] = $object->getIdUsuario();
        
        if($object->getAdmin()==1){
            echo "http://tres.fpz1920.com/view/admin.php";
        }else {
            $habitaciones= new habitacionModel();
            $habitaciones->setList();
            
            $_SESSION["habitaciones"] = $habitaciones->getList();
            
            echo "http://tres.fpz1920.com/view/hotel.php";
        }
    }
}
?>