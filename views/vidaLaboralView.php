<?php
	
	session_start();
	if (isset($_SESSION["admin"])) {
?>

<h1>Consultar vida laboral</h1>
<?php
	include_once("../models/funcionesComunesModel.php");
	$employees = obtainEmployees();
?>
<form method="post" action="vidaLaboralController.php">	
	<label for="first_name">Empleado</label>
	<select name="first_name">
		<?php foreach($employees as $employee) : ?>
			<option> <?php echo $employee ?> </option>
		<?php endforeach; ?>
    </select><br><br>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			obtenerDatosEmployees();

		}
	?>
	<input type="submit" value="Consultar la vida laboral"/>
</form>



<a href="../views/inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:loginIndex.php"); 
}