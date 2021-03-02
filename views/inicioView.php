<?php
	session_start();

if (isset($_SESSION["usuario"])||isset($_SESSION["admin"])) {

		$log = $_SESSION["usuario"];
?>
	<h1> Bienvenido <?php echo $log; ?></h1>

	
<?php
} else {
	header("location: ../loginIndex.php"); 
													
}	if (isset($_SESSION["admin"])) {
	?>
	<li><a href="altaEmpView.php">Alta Empleado</a></li>
	<li><a href="">Alta Masiva Empleado</a></li>
	<li><a href="modSalView.php">Modificar Salario</a></li>
	<li><a href=".php">Vida Laboral</a></li>
	<li><a href=".php">Info Departamentos</a></li>
	<li><a href=".php">Cambio Departamento</a></li>
	<li><a href=".php">Nuevo Jefe Departamento</a></li>
	<li><a href=".php">Baja Empleado</a></li>
	
<?php } 
?>
<li><a href="../loginIndex.php">Cerrar sesion</a></li>