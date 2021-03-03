<?php
	
	function obtainEmployees(){
		
		global $conexion;
		
		$sql = "SELECT first_name from employees limit 100";
		
		foreach ($conexion->query($sql) as $row) {
            $employees[]=$row['first_name'];   
		}
		return $employees;
	}

	function obtainDepts(){
		global $conexion;
		
		$sql = "SELECT dept_name from departments";
		
		foreach ($conexion->query($sql) as $row) {
            $departamentos[]=$row['dept_name'];   
    
		}
		return $departamentos;
	}

	function getEmpNumber(){
		global $conexion;
		
		$first_name=$_POST["first_name"];
		
		$consulta = $conexion->prepare("SELECT first_name, emp_no FROM employees limit 100");
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["first_name"]==$first_name){
					return $datos[$i]["emp_no"];
				}
			}
		}else{
			return null;
		}
	}

	function getEmpName($emp_no){
		global $conexion;
		
		$consulta = $conexion->prepare("SELECT first_name, emp_no FROM employees limit 100");
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["emp_no"]==$emp_no){
					return $datos[$i]["first_name"];
				}
			}
		}else{
			return null;
		}
	}

	function getDeptNumber(){
		global $conexion;
		
		$dept_name=$_POST["dept_name"];
		
		$consulta = $conexion->prepare("SELECT dept_name, dept_no FROM departments");
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){

				if($datos[$i]["dept_name"]==$dept_name){
					return $datos[$i]["dept_no"];
				}
			}
		}else{
			return null;
		}
	}

	function getDeptName($dept_no){
		global $conexion;
		
		$consulta = $conexion->prepare("SELECT dept_name, dept_no FROM departments");
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["dept_no"]==$dept_no){
					return $datos[$i]["dept_name"];
				}
			}
		}else{
			return null;
		}
	}
	
	function getDeptNumberFromEmpNo($emp_no){
		global $conexion;
		
		$consulta = $conexion->prepare("SELECT * FROM dept_emp limit 1000");
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