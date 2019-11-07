<?php
session_start();
include_once ("../model/usuarioModel.php");
include_once ("../model/habitacionModel.php");

$usuario= new usuarioModel();
$usuario->setList();

$usuarios = $usuario->getList();

foreach ($usuarios as $object){
    if($object->getUsuario()==$_POST["user"] && $object->getContrasena()==$_POST["pass"]){
               
        $_SESSION["usuario"] = $object->getUsuario();
        $_SESSION["id"] = $object->getIdUsuario();
        $_SESSION["admin"] = $object->getAdmin();
        
        if($object->getAdmin()==1){
            echo "view/vAdmin.php";
        }else {
            $habitaciones= new habitacionModel();
            $habitaciones->setList();
            
            $_SESSION["habitaciones"] = $habitaciones->getList();
            
            echo "view/vHotel.php";
        }
    }
}
?>