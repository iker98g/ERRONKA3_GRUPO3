<?php
include_once ("connect_data.php");  // klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
include_once ("habitacion_class.php");

class habitacion_model extends habitacion_class{
    
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
        
        $sql = "CALL spAllHabitaciones()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new habitacion_class();
            
            $new->setIdHabitacion($row['idHabitacion']);
            $new->setTipo($row['tipo']);
            $new->setImagen($row['imagen']);
            $new->setPrecio($row['precio']);
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function update()
    {
        $this->OpenConnect();
        
        $idHabitacion=$this->getIdHabitacion();
        $tipo=$this->getTipo();
        $imagen= $this->getImagen();
        $precio= $this->getPrecio();
       
        
        $sql = "CALL spModificarHabitacion('$idHabitacion','$tipo', '$imagen', '$precio')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "La habitacion se ha modificado con exito";
        } else {
            return "Fallo en la modificacion de la habitacion: (" . $this->link->errno . ") " . $this->link->error;
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