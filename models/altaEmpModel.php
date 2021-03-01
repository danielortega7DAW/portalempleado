<?php

	function obtainDept(){
		global $conexion;
		$sql = "SELECT dept_name from departments";
		
		foreach ($conexion->query($sql) as $row) {
            $departamentos[]=$row['dept_name'];   
    
		}
		return $departamentos;
	}
	
	function aquivanlascosasdehacer(){
		global $conexion;
		$emp_no=$_POST["emp_no"];
		$birth_date=$_POST["birth_date"];
		$first_name=$_POST["first_name"];
		$last_name=$_POST["last_name"];
		$gender=$_POST["gender"];
		$hire_date=$_POST["hire_date"];
		$dept_no=$_POST["dept_no"];
		$salary=$_POST["salary"];
		$title=$_POST["title"];
		
		$sql = "INSERT INTO employees values('$emp_no','$birth_date','$first_name','$last_name', '$gender', '$hire_date')";
		
		$consulta = $conexion->prepare("SELECT * FROM departments WHERE emp_no = :user");
		$consulta->bindParam(":user", $emp_no);
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);

		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){

				if($datos[$i]["dept_no"]==$dept_no){
					$departamento=$datos[$i]["dept_name"];
				}
			}
		}
		
		
		$sql2= "INSERT INTO dept_emp VALUES('$emp_no','$departamento', GETDATE(),'9999-01-01')";
		
		$sql3= "INSERT INTO salaries VALUES ('$emp_no', '$salary', GETDATE())";

		$sql4= "INSERT INTO titels VALUES ('$emp_no', '$title', GETDATE())";

	}

?>