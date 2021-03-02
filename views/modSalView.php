<?php
require_once("../controllers/modSalController.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {//Si el formulario ha sido realizado se inicia la funcion user()
		
			$user=user();
		
	}

?>

<h1>Modificar salarios</h1>
<form method="post" action="modSalView.php">
	
	<?php
		$employees = obtainEmployees();
	?>
	
	<label for="first_name">Empleado</label>
	<select name="first_name">
		<?php foreach($employees as $employee) : ?>
			<option> <?php echo $employee ?> </option>
		<?php endforeach; ?>
    </select><br><br>
	
	<label for="salary">Nuevo salario </label>
		<input type="text" name="salary" required/><br><br>
		<input type="submit" value="Confirmar Cambio"/>
</form>
