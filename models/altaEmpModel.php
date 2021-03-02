<?php


	function obtainDept(){
		
		global $conexion;
		
		$sql = "SELECT dept_name from departments";
		
		foreach ($conexion->query($sql) as $row) {
            $departamentos[]=$row['dept_name'];   
    
		}
		return $departamentos;
	}
	
	function empAlta(){
		global $conexion;
		$emp_no=$_POST["emp_no"];
		$birth_date=$_POST["birth_date"];
		$first_name=$_POST["first_name"];
		$last_name=$_POST["last_name"];
		$gender=$_POST["gender"];
		$hire_date=$_POST["hire_date"];
		$dept_no=getDepNumber();
		$salary=$_POST["salary"];
		$title=$_POST["title"];
		
		$date = date('Y-m-d H:i:s');
		$date2 = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 364 day"));
		
		$sql = "INSERT INTO employees values('$emp_no','$birth_date','$first_name','$last_name', '$gender', '$hire_date')";
		
		$sql2= "INSERT INTO dept_emp VALUES('$emp_no','$dept_no', '$date','9999-01-01')";
		
		$sql3= "INSERT INTO salaries VALUES ('$emp_no', '$salary', '$date', '$date2')";

		$sql4= "INSERT INTO titles VALUES ('$emp_no', '$title', '$date', '9999-01-01')";
		
		$conexion->exec($sql);
		$conexion->exec($sql2);
		$conexion->exec($sql3);
		$conexion->exec($sql4);
		
	}

	function getDepNumber(){
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

?>