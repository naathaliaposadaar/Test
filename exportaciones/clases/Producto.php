<?php
class Producto{
	private $nidproducto;
	private $snombre;
	private $ntotalusd;
	private $nano;
	private $querysel;
	function __construct($nid=NULL,$snom=NULL,$ntot=NULL,$nano=NULL){
		$this->nidproducto=$nid;
		$this->snombre=$snom;
		$this->ntotalusd=$ntot;
		$this->nano=$nano;
		
	}
	
	function IdProducto(){
		return $this->nidproducto;
	}
	
	function Nombre(){
		return $this->snombre;
	}
	
	function TotalUSD(){
		return $this->ntotalusd;
	}
	function Ano(){
		return $this->nano;
	}
	
        function insert($nombre,$totalusd,$ano){
             /*Llamado a la función que crea la instancia del objeto PDO*/
        
        $db= dbconnect();
        
        /*Declaración de la sentencia SQL que se requiere ejecutar*/
        $squery="INSERT INTO productos(NOMBRE,TOTALUSD,ANO) VALUES (:nom,:total,:anno)";
        
        /*Instancia del objeto que realizará el query*/
        $queryseleccion=$db->prepare($squery);
        
        $queryseleccion->bindParam(":nom",$nombre);
        $queryseleccion->bindParam(":total",$totalusd);
        $queryseleccion->bindParam(":anno",$Ano);
        
        $resultado=$queryseleccion->execute();
        $ot = new Transacciones("", "", "", "");
                $ot->log("nuevo","Producto","I",$nombre);
        return $resultado;
            
        }
	function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="select idproducto,nombre,totalusd,ano from productos order by nombre";
		
			/*Preparaci�n SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idproducto'], $registro['nombre'], $registro['totalusd'], $registro['ano']);			
		}
		else {
			return false;
			
		}
	}
	
	function Elimina($id){
	
		$db=dbconnect();
		
			/*Definici�n del query que permitira eliminar un registro*/
			$sqldel="delete from productos where idproducto=:id";
	
			/*Preparaci�n SQL*/
			$querydel=$db->prepare($sqldel);
			
			$querydel->bindParam(':id',$id);
			
			$valaux=$querydel->execute();
                $oTran= New Transacciones("","" , "", "");
                $oTran->log($id,"Producto","D","DP");
		return $valaux;
	}
					
}
?>