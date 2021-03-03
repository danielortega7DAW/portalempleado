<?php
	
	function update(){
		include_once("funcionesComunesModel.php");

		global $conexion;
		$salary=$_POST["salary"];
		$emp_no=getEmpNumber();
		try{
			$sql="UPDATE salaries SET salary='$salary' where emp_no='$emp_no'";
			$conexion->exec($sql);
		}catch(PDOException $ex){
			echo "<p>Ha ocurrido un error con la base de datos <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		}
	}

?>