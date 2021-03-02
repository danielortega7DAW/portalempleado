<?php
	session_start();

if (isset($_SESSION["usuario"])||isset($_SESSION["admin"])) {
		include_once("../db/db.php");
		include_once("../models/modSalModel.php");
		$log = $_SESSION["usuario"];
		$log2=getEmpName($log);

?>
	<h1> Bienvenido <?php echo $log2; ?></h1>

	
<?php
} else {
	header("location: ../loginIndex.php"); 
													
}	if (isset($_SESSION["admin"])) {
	?>
	<li><a href="altaEmpView.php">Alta Empleado</a></li>
	<li><a href="">Alta Masiva Empleado</a></li>
	<li><a href="modSalView.php">Modificar Salario</a></li>
	<li><a href="vidaLaboralView.php">Vida Laboral</a></li>
	<li><a href="infoDeptView.php">Info Departamentos</a></li>
	<li><a href="cambioDeptView.php">Cambio Departamento</a></li>
	<li><a href="nuevoJefeView.php">Nuevo Jefe Departamento</a></li>
	<li><a href="View.php">Baja Empleado</a></li>
	
<?php } 
?>
<li><a href="../loginIndex.php">Cerrar sesion</a></li>