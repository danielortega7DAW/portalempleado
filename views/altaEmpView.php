<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	}

session_start();

if (isset($_SESSION["admin"])) {
	
?>
<h1>Alta Empleado</h1>

<form method="post" action="altaEmpIndex.php">
	<label for="emp_no">Numero de empleado </label>
	<input type="text" name="emp_no" required/><br><br>
	
	<label for="birth_date">Fecha de nacimiento </label>
	<input type="date" name="birth_date" required/><br><br>
	
	<label for="first_name">Nombre </label>
	<input type="text" name="first_name" required/><br><br>
	
	<label for="last_name">Apellido </label>
	<input type="text" name="last_name" required/><br><br>
	
	<label for="gender">Genero </label>
	<select name="gender">
		<option>F</option>
		<option>M</option>
    </select>
	
	<label for="hire_date">Fecha de contratacion </label>
	<input type="text" name="hire_date" required/><br><br>
	
	<?php
		$departamentos = obtainDept();
		$cargo = obtainTitle();
	?>
	
	<label for="dept_name">Departamento  </label>
		<select name="dept_name">
			<?php foreach($departamentos as $departamento) : ?>
				<option> <?php echo $departamento ?> </option>
			<?php endforeach; ?>
        </select>
	<br><br>
	
	<label for="salary">Salario </label>
	<input type="text" name="salary" required/><br><br>
	
	<label for="title">Cargo </label>
	<input type="text" name="cargo" required/><br><br>
		
	<input type="submit" value="Enviar"/>
</form>

<a href="views/inicioView.php">Volver a inicio</a>
<?php }else{
	header("location: ../loginIndex.php"); 
}