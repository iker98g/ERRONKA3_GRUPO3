<?php
include_once ("connect_data.php");  // klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
include_once ("usuario_class.php");

class usuario_model extends usuario_class{
    
    private $link; 
    private $list = array();
    
    function getList() {
        return $this->list;
    }
    
    public function OpenConnect()
    {
        $konDat=new connect_data();
        try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión.
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect()
    {
        mysqli_close ($this->link);
    }
    
    public function setList()
    {
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql = "CALL spAllUsers()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new usuario_class();
            
            $new->setIdUsuario($row['idUsuario']);
            $new->setNombre($row['nombre']);
            $new->setApellido($row['apellido']);
            $new->setUsuario($row['usuario']);
            $new->setContrasena($row['contrasena']);
            $new->setAdmin($row['admin']);
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    
    public function delete()
    {
        $this->OpenConnect();
        
        $idUsuario=$this->getIdUsuario();
        
        
        $sql = "CALL spBorrarUsuario('$idUsuario')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "El usuario se ha borrado con exito";
        } else {
            return "Fallo en el borrado del usuario: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function insert()
    {
        $this->OpenConnect();
        
        $nombre=$this->getNombre();
        $apellido= $this->getApellido();
        $usuario= $this->getUsuario();
        $contrasena= $this->getContrasena();
        $admin= $this->getAdmin();
        
        $sql = "CALL spCrearUsuario('$nombre', '$apellido', '$usuario', '$contrasena', '$admin')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "El usuario se ha insertado con exito";
        } else {
            return "Fallo en la insercion del usuario: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function update()
    {
        $this->OpenConnect();
        
        $idUsuario=$this->getIdUsuario();
        $nombre=$this->getNombre();
        $apellido= $this->getApellido();
        $usuario= $this->getUsuario();
        $admin= $this->getAdmin();
        
        
        $sql = "CALL spModificarUsuario('$idUsuario','$nombre', '$apellido', '$usuario', '$admin')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "El usuario se ha modificado con exito";
        } else {
            return "Fallo en la modificacion del usuario: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    function getListJsonString() {
        
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = get_object_vars($object);
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
    
    
}