<?php
	function cambioJefe(){
		include_once("modSalModel.php");
		$emp_no = getEmpNumber();

		global $conexion;
		$date = date('Y-m-d H:i:s');
		$dept_no = getDeptNumberFromEmpNo($emp_no);
		try{
			$sql = $conexion->prepare("UPDATE dept_manager SET to_date = '$date' WHERE dept_no='$dept_no' AND to_date='9999-01-01'");
			$sql->execute();
			$sql2 = $conexion->prepare("INSERT INTO dept_manager VALUES('$emp_no','$dept_no', '$date','9999-01-01')");
			$sql2->execute();
		}catch(PDOException $ex){
			echo "<p>Ha ocurrido un error con la base de datos <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		}

	}

	function getDeptNumberFromEmpNo($emp_no){
		global $conexion;
		
		$consulta = $conexion->prepare("SELECT * FROM dept_emp limit 100");
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["emp_no"]==$emp_no){
					return $datos[$i]["dept_no"];
				}
			}
		}else{
			return null;
		}
	}
	
?>