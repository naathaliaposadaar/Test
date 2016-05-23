<?php
include("../librerias.php");
//recuperar sesion
$oPro=new Producto();
foreach ($_POST as $id){
	$oPro->Elimina($id);	
};
?>

<script>
	document.location.href="<?=PATHURL?>exportaciones_del.php";
</script>