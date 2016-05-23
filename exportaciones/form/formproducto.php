<?php
$oProducto=new Producto();
?>
<form method="post" action="accform/accProductoIngresar.php">
<div>Nombre Producto:</div><div><input name="nombre" type=text id="nombre"></div>
<br>
<div>Total USD:</div><div><input name="total" type="number" id="total"></div>
<div>Año:</div><div><input name="anno" type="number" id="anno"></div>
<input type="submit" value=Acceder>
</form>