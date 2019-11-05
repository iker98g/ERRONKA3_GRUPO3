<?php
//Klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
if ($_SERVER['SERVER_NAME']=="tres.fpz1920.com") {
    include_once ("connect_data_remote.php");
}else {
    include_once ("connect_data_local.php");
}

include_once ("reservaClass.php");
include_once("habitacionModel.php");
include_once("usuarioModel.php");

class reservaModel extends reservaClass {
    
    private $link;
    private $list = array();
    private $objectHabitacion;
    private $objectUsuario;
    
    function getList() {
        return $this->list;
    }
    
    public function getObjectHabitacion() {
        return $this->objectHabitacion;
    }
    
    public function getObjectUsuario() {
        return $this->objectUsuario;
    }
    
    public function OpenConnect() {
        $konDat=new connect_data();
        try {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión.
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect() {
        mysqli_close ($this->link);
    }
    
    public function setList() {
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql = "CALL spAllReservas()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new reservaModel();
            
            $new->setIdReserva($row['idReserva']);
            $new->setIdHabitacion($row['idHabitacion']);
            $new->setIdUsuario($row['idUsuario']);
            $new->setFechaInicio($row['fechaInicio']);
            $new->setFechaFin($row['fechaFin']);
            $new->setPrecioTotal($row['precioTotal']);
            
            $habitacion=new habitacionModel();
            $habitacion->setIdHabitacion($row['idHabitacion']);
            $new->objectHabitacion=$habitacion->findRoomById();
            
            $usuario=new usuarioModel();
            $usuario->setIdUsuario($row['idUsuario']);
            $new->objectUsuario=$usuario->findUserById();
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        unset($habitacion);
        unset($usuario);
        $this->CloseConnect();
    }
    
    public function setReservasUser($userId) {
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $idUser=$userId;
        
        $sql = "CALL spReservasPorUsuario('$idUser')"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new reservaModel();
            
            $new->setIdReserva($row['idReserva']);
            $new->setIdHabitacion($row['idHabitacion']);
            $new->setIdUsuario($row['idUsuario']);
            $new->setFechaInicio($row['fechaInicio']);
            $new->setFechaFin($row['fechaFin']);
            $new->setPrecioTotal($row['precioTotal']);
            
            $habitacion=new habitacionModel();
            $habitacion->setIdHabitacion($row['idHabitacion']);
            $new->objectHabitacion=$habitacion->findRoomById();
            
            $usuario=new usuarioModel();
            $usuario->setIdUsuario($row['idUsuario']);
            $new->objectUsuario=$usuario->findUserById();
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        unset($habitacion);
        unset($usuario);
        $this->CloseConnect();
    }
    
    public function update() {
        $this->OpenConnect();
        
        $idReserva=$this->getIdReserva();
        $idHabitacion=$this->getIdHabitacion();
        $idUsuario= $this->getIdUsuario();
        $fechaInicio= $this->getFechaInicio();
        $fechaFin= $this->getFechaFin();
        $precioTotal= $this->getPrecioTotal();
        
        $sql = "CALL spModificarReserva('$idReserva','$idHabitacion', '$idUsuario', '$fechaInicio', '$fechaFin', '$precioTotal')";
        
        if ($this->link->query($sql)>=1) { // aldatu egiten da
            return "La reserva se ha modificado con exito";
        } else {
            return "Fallo en la modificacion de la reserva: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function delete() {
        $this->OpenConnect();
        
        $idReserva=$this->getIdReserva();
        
        
        $sql = "CALL spBorrarReserva('$idReserva')";
        
        if ($this->link->query($sql)>=1) { // aldatu egiten da
            return "La reserva se ha borrado con exito";
        } else {
            return "Fallo en el borrado de la reserva: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function insertReserva() {
        
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
    
    public function comprobarDisponibilidad($fechaInicio, $fechaFin) {
        
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql="CALL spComprobarDisponibilidad('$fechaInicio', '$fechaFin')";
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new reservaClass();
            
            $new->setIdHabitacion($row['idHabitacion']);
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        
        $this->CloseConnect();
    }
    
    function getListJsonString() {
        
        $arr=array();
        
        foreach ($this->list as $object) {
            $vars = get_object_vars($object);
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
    
    function getListJsonStringObject() {
        
        // returns the list of objects in a srting with JSON format
        $arr=array();
        
        foreach ($this->list as $object) {
            $vars = $object->getObjectVars();
            
            $objHabitacion=$object->getObjectHabitacion()->getObjectVars();
            $vars['objectHabitacion']=$objHabitacion;
            
            $objUsuario=$object->getObjectUsuario()->getObjectVars();
            $vars['objectUsuario']=$objUsuario;
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    } 
}