<?php
class actorClass {
    protected $idActor;
    protected $NombreActor;
    
    public function getIdActor()
    {
        return $this->idActor;
    }
    
    public function getNombreActor()
    {
        return $this->NombreActor;
    }
    
    public function setIdActor($idActor)
    {
        $this->idActor = $idActor;
    }
    
    public function setNombreActor($NombreActor)
    {
        $this->NombreActor = $NombreActor;
    }
    
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }
    
    
?>