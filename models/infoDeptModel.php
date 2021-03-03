<?php
	include_once("funcionesComunesModel.php");
	function obtainInfo(){
		
		$dept_no=getDeptNumber();

		global $conexion;
		
		$sql = $conexion->prepare("SELECT * FROM dept_emp limit 100");
		$sql->execute();
		$datos = $sql -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["dept_no"]==$dept_no){
					echo "Numero de empleado: ".$datos[$i]["emp_no"]."<BR>";
					echo "Fecha de entrada al departamento: ".$datos[$i]["from_date"]."<BR>";
					echo "Fecha de salida del departamento: ".$datos[$i]["to_date"]."<BR>";
				}
			}
		}
	}

	function obtainInfoJefe(){
		
		$dept_no=getDeptNumber();

		global $conexion;
		
		$sql = $conexion->prepare("SELECT * FROM dept_manager limit 100");
		$sql->execute();
		$datos = $sql -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["dept_no"]==$dept_no){
					echo "Numero de empleado: ".$datos[$i]["emp_no"]."<BR>";
					echo "Fecha de entrada al departamento: ".$datos[$i]["from_date"]."<BR>";
					echo "Fecha de salida del departamento: ".$datos[$i]["to_date"]."<BR>";
				}
			}
		}
	}

?>