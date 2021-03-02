<?php
	
	function obtainEmployees(){
		
		global $conexion;
		
		$sql = "SELECT first_name from employees limit 100";
		
		foreach ($conexion->query($sql) as $row) {
            $employees[]=$row['first_name'];   
		}
		return $employees;
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

	function update(){
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