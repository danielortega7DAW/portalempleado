<?php
include_once("funcionesComunesModel.php");

	function darBaja(){
		$emp_no = getEmpNumber();

		global $conexion;
		$date = date('Y-m-d H:i:s');
		
		try{
			$sql = $conexion->prepare("UPDATE salaries SET to_date = '$date' WHERE emp_no='$emp_no' AND to_date='9999-01-01'");
			$sql->execute();
			$sql = $conexion->prepare("UPDATE titles SET to_date = '$date' WHERE emp_no='$emp_no' AND to_date='9999-01-01'");
			$sql->execute();
			try{
				$sql = $conexion->prepare("UPDATE dept_emp SET to_date = '$date' WHERE emp_no='$emp_no' AND to_date='9999-01-01'");
				$sql->execute();
			}catch(PDOException $ex){
				echo "<a> Este empleado es un manager <a>";
				$sql = $conexion->prepare("UPDATE dept_manager SET to_date = '$date' WHERE emp_no='$emp_no' AND to_date='9999-01-01'");
				$sql->execute();	
			}	
		}catch(PDOException $ex){
			echo "<p>Ha ocurrido un error con la base de datos <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		}
	}
	
?>