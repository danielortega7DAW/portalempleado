<?php
	function infoNomina(){
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
					$nomina = $datos[$i]["salary"];
				}
			}
		}
		$consulta2 = $conexion->prepare("SELECT * FROM titles WHERE emp_no='$emp_no'");
		$consulta2->execute();
		$datos2 = $consulta2 -> fetchAll(PDO::FETCH_ASSOC);
		
		if($datos2!==null){
			for ($i=0; $i<count($datos2); $i++){
				if($datos2[$i]["emp_no"]==$emp_no){
					$title = $datos2[$i]["title"];
				}
			}
		}

		if(strpos($title, 'Engineer')){
			$nomina+=10000;
		}

		if($nomina<40000){
			$nomina=$nomina*0.825;
		}
		if($nomina>=40000&&$nomina<=70000){
			$nomina=$nomina*0.725;
		}
		if($nomina>70000){
			$nomina=$nomina*0.625;
		}
		echo "Hola, $first_name, estos son sus datos: "."<BR>";
		echo "Su nomina es: $nomina eurillos"."<BR>";
		echo "Trabaja en el departamento de $dept_name"."<BR>";
		echo "Su cargo es: $title"."<br><br>";

	}

?>