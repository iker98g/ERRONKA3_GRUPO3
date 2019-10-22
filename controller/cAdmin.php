<?php

include_once ("../model/usuario_model.php");

$user=new usuario_model();

$admin=$user->getAdmin();

if ($admin==1) {
    include_once ("../view/admin.php");
}
?>