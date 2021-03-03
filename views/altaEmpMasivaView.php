<?ph
session_start();
if (isset($_SESSION["admin"])) {
?>
<h1>Alta masiva empleado</h1>
<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
	<label for="emp_no">Numero de empleado </label>
	<input type="text" name="emp_no" /><br><br>
	
	<label for="birth_date">Fecha de nacimiento </label>
	<input type="date" name="birth_date" /><br><br>
	
	<label for="first_name">Nombre </label>
	<input type="text" name="first_name" /><br><br>
	
	<label for="last_name">Apellido </label>
	<input type="text" name="last_name" /><br><br>
	
	<label for="gender">Genero </label>
	<select name="gender">
		<option>F</option>
		<option>M</option>
    </select><br><br>
	
	<label for="hire_date">Fecha de contratacion </label>
	<input type="date" name="hire_date" /><br><br>
	
	<?php
		require_once("../db/db.php");
		global $conexion;
		include_once("../models/funcionesComunesModel.php");
		$departamentos = obtainDepts();
	?>
	
	<label for="dept_name">Departamento  </label>
		<select name="dept_name">
			<?php foreach($departamentos as $departamento) : ?>
				<option> <?php echo $departamento ?> </option>
			<?php endforeach; ?>
        </select>
	<br><br>
	
	<label for="salary">Salario </label>
	<input type="text" name="salary"/><br><br>
	
	<label for="title">Cargo </label>
	<input type="text" name="title"/><br><br>

	<input type="submit" name="submit" value="Add Empleado"/>
    <input type="submit" name="submit" value="Dar de alta"/><br><br>
<a href="../views/inicioView.php">Volver a inicio</a>
</form>
<?php

if (isset($_SESSION["empleados"]) && !empty($_SESSION["empleados"])) {
	echo "<h2>Empleados a esperas de ser dados de alta:</h2>";
	echo "<table border='1' cellpadding='5'><tr><th>Nombre</th><th>Apellidos</th><th>Fcha. Nacimiento</th><th>Género</th><th>Salario</th><th>Departamento</th><th>Titulo</th>";

	$empleados = $_SESSION["empleados"];
	
	foreach ($empleados as $emp) {
		echo "<tr><td>". $emp["first_name"] ."</td><td>". $emp["last_name"] ."</td><td>". $emp["birth_date"] ."</td><td>". $emp["gender"] ."</td><td>". $emp["salary"] ."</td><td>". $emp["dept_no"] ."</td><td>". $emp["title"] ."</td></tr>"; 
	}
	
	echo "</table>";
}
?>