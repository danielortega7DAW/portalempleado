<?php
require_once("../controllers/nuevoJefeController.php");
	
	session_start();
	if (isset($_SESSION["admin"])) {
?>

<h1>Cambiar departamento</h1>
<?php
	include_once("../models/modSalModel.php");
	$employees = obtainEmployees();
?>
<form method="post" action="NuevoJefeView.php">
	<label for="first_name">Empleado que pasa a ser Jefe</label>
	<select name="first_name">
		<?php foreach($employees as $employee) : ?>
			<option> <?php echo $employee ?> </option>
		<?php endforeach; ?>
    </select><br><br>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			cambioJefe();
		}
	?>
	<input type="submit" value="Confirmar cambio"/>
</form>

<a href="inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:loginIndex.php"); 
}