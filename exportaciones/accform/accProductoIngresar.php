<?php
include("../librerias.php");
$oP = new Producto($nid=Null, $snom=NULL, $ntot=NULL, $nano=NULL);
//$newpewd=$_POST['newpwd'];
$nombre=$_POST['nombre'];
$total=$_POST['total'];
$anno=$_POST['anno'];
session_start();
if (!isset($_SESSION["oUsuario"])){
	?>
<!-- Reenvio a la p�gina principal-->
<script>
	document.location.href="index.php";
</script>
<?php 
}

$oUsr=$_SESSION["oUsuario"];
var_dump($oUsr);
if($oP->insert()) echo "producto ingresado"; else echo "ERROR";
?>