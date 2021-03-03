<?php
	
	session_start();
	if (isset($_SESSION["admin"])) {
?>

<h1>Jefe departamento</h1>
<?php
	include_once("../models/funcionesComunesModel.php");
	$employees = obtainEmployees();
?>
<form method="post" action="NuevoJefeController.php">
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

<a href="../views/inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:loginIndex.php"); 
}