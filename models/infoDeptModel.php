<?php
	
	function obtainDepts(){
		global $conexion;		
		
		$sql = "SELECT dept_name FROM departments";
		
		foreach ($conexion->query($sql) as $row) {
            $departamentos[]=$row['dept_name'];   
		}
		return $departamentos;
	}

	function obtainInfo(){
		include_once("altaEmpModel.php");
		$dept_no=getDepNumber();

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
		include_once("altaEmpModel.php");
		$dept_no=getDepNumber();

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