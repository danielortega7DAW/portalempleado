<?php
	session_start();

if (isset($_SESSION["usuario"])) {//Si exista dicha sesión se muestra el indice

		$log = $_SESSION["usuario"];
?>
	<h1> Bienvenido <?php echo $log; ?></h1>

	<li><a href="../altaEmpIndex.php">Alta Empleado</a></li>
<?php
} else {
		// Si el usuario NO ha iniciado sesión se redirige a "index.php"
		header("location: ../loginIndex.php"); 
													
}	if (isset($_SESSION["admin"])) {//Si exista dicha sesión se muestra el indice

	?>

	<li><a href="">Alta Masiva Empleado</a></li>
	<li><a href=".php">Modificar Salario</a></li>
	<li><a href=".php">Vida Laboral</a></li>
	<li><a href=".php">Info Departamentos</a></li>
	<li><a href=".php">Cambio Departamento</a></li>
	<li><a href=".php">Nuevo Jefe Departamento</a></li>
	<li><a href=".php">Baja Empleado</a></li>
	
<?php } 
?>
<li><a href="../loginIndex.php">Cerrar sesion</a></li>