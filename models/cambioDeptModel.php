<?php
	function cambioDepartamento(){
		include_once("altaEmpModel.php");
		$dept_no = getDepNumber();
		include_once("modSalModel.php");
		$emp_no = getEmpNumber();

		global $conexion;
		$date = date('Y-m-d H:i:s');
		try{
			$sql = $conexion->prepare("UPDATE dept_emp SET to_date = '$date' WHERE emp_no='$emp_no' AND to_date='9999-01-01'");
			$sql->execute();
			$sql2 = $conexion->prepare("INSERT INTO dept_emp VALUES('$emp_no','$dept_no', '$date','9999-01-01')");
			$sql2->execute();
		}catch(PDOException $ex){
			echo "<p>Ha ocurrido un error con la base de datos <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		}

	}
	
?>