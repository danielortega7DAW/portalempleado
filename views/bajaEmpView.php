<?php
	
	session_start();
	if (isset($_SESSION["admin"])) {
?>

<h1>Dar baja</h1>
<?php
	include_once("../models/funcionesComunesModel.php");
	$employees = obtainEmployees();
?>
<form method="post" action="bajaEmpController.php">	
	<label for="first_name">Empleado al que dar la baja</label>
	<select name="first_name">
		<?php foreach($employees as $employee) : ?>
			<option> <?php echo $employee ?> </option>
		<?php endforeach; ?>
    </select><br><br>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			darBaja();

		}
	?>
	<input type="submit" value="Confirmar baja"/>
</form>



<a href="../views/inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:loginIndex.php"); 
}