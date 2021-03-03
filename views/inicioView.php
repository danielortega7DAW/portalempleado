<?php
	session_start();

if (isset($_SESSION["usuario"])||isset($_SESSION["admin"])) {
		include_once("../db/db.php");
		include_once("../models/funcionesComunesModel.php");
		$log = $_SESSION["usuario"];
		$log2=getEmpName($log);

?>
	<h1> Bienvenido <?php echo $log2; ?></h1>

	
<?php
} else {
	header("location: ../loginIndex.php"); 
													
}	if (isset($_SESSION["admin"])) {
	?>
	<li><a href="../Controllers/altaEmpController.php">Alta Empleado</a></li>
	<li><a href="../Controllers/altaEmpMasivaController.php">Alta Masiva Empleado</a></li>
	<li><a href="../Controllers/modSalController.php">Modificar Salario</a></li>
	<li><a href="../Controllers/vidaLaboralController.php">Vida Laboral</a></li>
	<li><a href="../Controllers/infoDeptController.php">Info Departamentos</a></li>
	<li><a href="../Controllers/cambioDeptController.php">Cambio Departamento</a></li>
	<li><a href="../Controllers/nuevoJefeController.php">Nuevo Jefe Departamento</a></li>
	<li><a href="../Controllers/bajaEmpController.php">Baja Empleado</a></li>
	
<?php } 
?>
<li><a href="../Controllers/nominaController.php">Nomina</a></li>
<li><a href="../Controllers/historialController.php">Historial laboral</a></li>
<li><a href="../loginIndex.php">Cerrar sesion</a></li>