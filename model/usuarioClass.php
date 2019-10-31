<?php
class usuarioClass {
    
    protected $idUsuario;
    protected $nombre;
    protected $apellido;
    protected $usuario;
    protected $contrasena;
    protected $admin;
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return $vars;
    }    
}
?>