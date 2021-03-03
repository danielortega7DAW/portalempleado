<?php
	
	session_start();
	if (isset($_SESSION["admin"])) {
?>

<h1>Cambiar departamento</h1>
<?php
	include_once("../models/funcionesComunesModel.php");
	$departamentos=obtainDepts();
	$employees = obtainEmployees();
?>
<form method="post" action="cambioDeptController.php">
	<label for="first_name">Empleado </label>
	<select name="first_name">
		<?php foreach($employees as $employee) : ?>
			<option> <?php echo $employee ?> </option>
		<?php endforeach; ?>
    </select><br><br>

	<label for="dept_name">Nuevo departamento</label>
	<select name="dept_name">
		<?php foreach($departamentos as $departamento) : ?>
			<option> <?php echo $departamento ?> </option>
		<?php endforeach; ?>
    </select><br><br>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			cambioDepartamento();
		}
	?>
	<input type="submit" value="Confirmar cambio"/>
</form>

<a href="../views/inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:loginIndex.php"); 
}