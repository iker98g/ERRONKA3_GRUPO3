<?php
//Klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
if ($_SERVER['SERVER_NAME']=="localhost") {
    include_once ("connect_data_local.php");
}else {
    include_once ("connect_data_remote.php");
}

include_once ("reserva_class.php");

class reserva_model extends reserva_class{
    
    private $link;
    private $list = array();
    //private $objUsuario;
    
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
        
        $sql = "CALL spAllReservas()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new reserva_class();
            
            $new->setIdReserva($row['idReserva']);
            $new->setIdHabitacion($row['idHabitacion']);
            $new->setIdUsuario($row['idUsuario']);
            $new->setFechaInicio($row['fechaInicio']);
            $new->setFechaFin($row['fechaFin']);
            $new->setPrecioTotal($row['precioTotal']);
            
            //$usuario=new usuario_model();
            //$usuario->setIdUsuario($row['idUsuario']);
            //$new->objUsuario= $usuario->findIdUsuario();
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function update()
    {
        $this->OpenConnect();
        
        $idReserva=$this->getIdReserva();
        $idHabitacion=$this->getIdHabitacion();
        $idUsuario= $this->getIdUsuario();
        $fechaInicio= $this->getFechaInicio();
        $fechaFin= $this->getFechaFin();
        $precioTotal= $this->getPrecioTotal();
        
        $sql = "CALL spModificarReserva('$idReserva','$idHabitacion', '$idUsuario', '$fechaInicio', '$fechaFin', '$precioTotal')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "La reserva se ha modificado con exito";
        } else {
            return "Fallo en la modificacion de la reserva: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function delete()
    {
        $this->OpenConnect();
        
        $idReserva=$this->getIdReserva();
        
        
        $sql = "CALL spBorrarReserva('$idReserva')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "La reserva se ha borrado con exito";
        } else {
            return "Fallo en el borrado de la reserva: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function insertReserva(){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $idHabitacion=$this->getIdHabitacion();
        $idUsuario=$this->getIdusuario();
        $fechaInicio=$this->getFechaInicio();
        $fechaFin=$this->getFechaFin();
        $precioTotal=$this->getPrecioTotal();
        
        $sql="CALL spInsertReserva($idHabitacion, $idUsuario, '$fechaInicio', '$fechaFin', $precioTotal)";
        
        $numFilas=$this->link->query($sql);
        
        if ($numFilas>=1) {
            return "Insertado";
        } else {
            return "Error al insertar";
        }
        
        $this->CloseConnect();
    }
    
    public function comprobarDisponibilidad($fechaInicio, $fechaFin){
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql="CALL spComprobarDisponibilidad('$fechaInicio', '$fechaFin')";
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new reserva_class();
            
            $new->setIdHabitacion($row['idHabitacion']);
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        
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