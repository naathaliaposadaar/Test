<?php
Class Transacciones{
    var $idusuario;
    var $nomtabla;
    var $accion;
    var $descripcion;
    
    public function __construct($idusuario,$nomtabla,$accion=NULL,$descripcion=NULL) {
        $this->idusuario=$idusuario;
        $this->nomtabla=$nomtabla;
        $this->accion=$accion;
        $this->descripcion=$descripcion;
    }
    function getIdusuario() {
        return $this->idusuario;
    }

    function getNomtabla() {
        return $this->nomtabla;
    }

    function getAccion() {
        return $this->accion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    public function log($usr,$tabla,$acc,$desc){
      
        /*Llamado a la función que crea la instancia del objeto PDO*/
        
        $db= dbconnect();
        
        /*Declaración de la sentencia SQL que se requiere ejecutar*/
        $squery="INSERT INTO logtransacciones(IDACCESO,NOMTABLA,ACCION,DESCRIPCION)VALUES (:usr,:tabla,:acc,:desc)";
        
        /*Instancia del objeto que realizará el query*/
        $queryseleccion=$db->prepare($squery);
        
        $queryseleccion->bindParam(":usr",$usr);
        $queryseleccion->bindParam(":tabla",$tabla);
        $queryseleccion->bindParam(":acc",$acc);
        $queryseleccion->bindParam(":desc",$desc);
        $datos=$queryseleccion->execute();
        
        
        
    }
}
?>
