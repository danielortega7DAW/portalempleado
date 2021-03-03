<?php
	
	session_start();
	if (isset($_SESSION["admin"])) {
?>

<h1>Informacion departamentos</h1>
<?php
	include_once("../models/funcionesComunesModel.php");
	$departamentos=obtainDepts();
?>
<form method="post" action="infoDeptController.php">	
	<label for="dept_name">Departamento</label>
	<select name="dept_name">
		<?php foreach($departamentos as $departamento) : ?>
			<option> <?php echo $departamento ?> </option>
		<?php endforeach; ?>
    </select><br><br>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			echo "Manager: "."<br><br>";
			obtainInfoJefe();
			echo "<br>"."Empleados: "."<BR><br>";
			obtainInfo();

		}
	?>
	<input type="submit" value="Obtener informacion"/>
</form>

<a href="../views/inicioView.php">Volver a inicio</a>

<?php }else{
	header("location:loginIndex.php"); 
}