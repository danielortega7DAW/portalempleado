<?php
	function obtenerDatosEmployees(){
		global $conexion;

		$sql= $conexion->prepare("SELECT * FROM employees limit 100");
		$sql->execute();
		$datos = $sql -> fetchAll(PDO::FETCH_ASSOC);
		$first_name = $_POST["first_name"];

		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["first_name"]==$first_name){
					echo "Id de empleado: ".$datos[$i]["emp_no"]."<BR>";
					$emp_no=$datos[$i]["emp_no"];
					echo "Fecha de nacimiento: ".$datos[$i]["birth_date"]."<BR>";
					echo "Primer nombre: ".$datos[$i]["first_name"]."<BR>";
					echo "Apellido: ".$datos[$i]["last_name"]."<BR>";
					echo "Genero: ".$datos[$i]["gender"]."<BR>";
					echo "Fecha de contratacion: ".$datos[$i]["hire_date"]."<BR>"."<BR>";			
				}
			}
		}

		$sql2= $conexion->prepare("SELECT * FROM dept_emp group by emp_no limit 100");
		$sql2->execute();
		$datos2 = $sql2 -> fetchAll(PDO::FETCH_ASSOC);
		if($datos2!==null){
			for ($i=0; $i<count($datos2); $i++){
				if($datos2[$i]["emp_no"]==$emp_no){
					echo "Departamento: ".$datos2[$i]["dept_no"]."<BR>";
					echo "Empezo en el departamento: ".$datos2[$i]["from_date"]."<BR>";
					echo "Dejo el departamento: ".$datos2[$i]["to_date"]."<BR>"."<BR>";
				}
			}
		}

		$sql3= $conexion->prepare("SELECT * FROM salaries group by emp_no limit 1000");
		$sql3->execute();
		$datos3 = $sql3 -> fetchAll(PDO::FETCH_ASSOC);
		if($datos3!==null){
			for ($i=0; $i<count($datos3); $i++){
				if($datos3[$i]["emp_no"]==$emp_no){
					echo "Salario: ".$datos3[$i]["salary"]."<BR>";
					echo "Empezo con este salario: ".$datos3[$i]["from_date"]."<BR>";
					echo "Acabo con este salario: ".$datos3[$i]["to_date"]."<BR>"."<BR>";
				}
			}
		}

		$sql4= $conexion->prepare("SELECT * FROM titles group by emp_no limit 1000");
		$sql4->execute();
		$datos4 = $sql4 -> fetchAll(PDO::FETCH_ASSOC);
		if($datos4!==null){
			for ($i=0; $i<count($datos4); $i++){
				if($datos4[$i]["emp_no"]==$emp_no){
					echo "Titulo: ".$datos4[$i]["title"]."<BR>";
					echo "Empezo con este titulo: ".$datos4[$i]["from_date"]."<BR>";
					echo "Acabo con este titulo: ".$datos4[$i]["to_date"]."<BR>"."<BR>";
				}
			}
		}

	}

?>