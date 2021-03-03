<?php
	function historial(){
		include_once("funcionesComunesModel.php");
		global $conexion;

		$emp_no = $_SESSION["usuario"];
		$first_name = getEmpName($emp_no);
		$dept_no = getDeptNumberFromEmpNo($emp_no);
		$dept_name = getDeptName($dept_no);

		$consulta = $conexion->prepare("SELECT * FROM salaries WHERE emp_no='$emp_no'");
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){
				if($datos[$i]["emp_no"]==$emp_no){
					echo "Su salario desde ".$datos[$i]["from_date"]." es de: ".$datos[$i]["salary"]."<BR>";
				}
			}
		}

		echo "<BR>";

		$consulta2 = $conexion->prepare("SELECT * FROM dept_emp WHERE emp_no='$emp_no'");
		$consulta2->execute();
		$datos2 = $consulta2 -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos2!==null){
			for ($i=0; $i<count($datos2); $i++){
				if($datos2[$i]["emp_no"]==$emp_no){
					echo "Su departamento desde ".$datos2[$i]["from_date"]." es: ".$datos2[$i]["dept_no"]."<BR>";
				}
			}
		}
	}

?>