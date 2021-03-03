<?php
	
	session_start();
	if (isset($_SESSION["usuario"])) {
?>

<h1>Mi nomina</h1>

	<?php

		historial();

	?>

<a href="../views/inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:../loginIndex.php"); 
}