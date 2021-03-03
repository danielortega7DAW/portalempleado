<?php
	
	require_once("../db/db.php");
	include_once("funcionesComunesModel.php");

	function darAltaEmpleado($birth_date, $first_name, $last_name, $gender, $dept_no, $salary, $title) {

		global $conexion;

		$emp_no = generarCodigoEmpleado();

		try {
			$conexion->beginTransaction();

			$insertDatos = $conexion->prepare("INSERT INTO employees VALUES (:numEmpleado, :nacimiento, :nombre, :apellidos, :genero, CURRENT_TIMESTAMP)");
			$insertDatos->bindParam(":numEmpleado", $emp_no);
			$insertDatos->bindParam(":nacimiento", $birth_date);
			$insertDatos->bindParam(":nombre", $first_name);
			$insertDatos->bindParam(":apellidos", $last_name);
			$insertDatos->bindParam(":genero", $gender);
			$insertDatos->execute();

			$insertDepartamento = $conexion->prepare("INSERT INTO dept_emp VALUES (:numEmpleado, :departamento, CURRENT_TIMESTAMP, '3000/01/01')");
			$insertDepartamento->bindParam(":numEmpleado", $emp_no);
			$insertDepartamento->bindParam(":departamento", $dept_no);
			$insertDepartamento->execute();

			$insertSalario = $conexion->prepare("INSERT INTO titles VALUES (:numEmpleado, :salario, CURRENT_TIMESTAMP, NULL)");
			$insertSalario->bindParam(":numEmpleado", $emp_no);
			$insertSalario->bindParam(":salario", $salary);
			$insertSalario->execute();

			$insertTitulo = $conexion->prepare("INSERT INTO titles VALUES (:numEmpleado, :titulo, CURRENT_TIMESTAMP, NULL)");
			$insertTitulo->bindParam(":numEmpleado", $emp_no);
			$insertTitulo->bindParam(":titulo", $title);
			$insertTitulo->execute();

			$conexion->commit();
			return true;

		} catch (PDOException $ex) {
			$conexion->rollBack();
			echo $ex->getMessage();
			return false;
		}
	}

	function generarCodigoEmpleado() {
		// Genera el siguiente código de empleado, ya que en la base de datos no está puesto como autonumérico
		// Devuelve el siguiente código a usar, o -1 si hay algún error

		global $conexion;

		try {
			$select = $conexion->prepare("SELECT MAX(emp_no) + 1 AS 'numEmpleado' FROM employees");
			$select->execute();

			return $select->fetch(PDO::FETCH_ASSOC)["numEmpleado"];
		} catch (PDOException $ex) {
			return -1;
		}

	}

	
?>