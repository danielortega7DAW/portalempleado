<?php

$_SESSION["empleados"]= null;
include_once "../models/funcionesComunesModel.php";
    if (isset($_POST) && !empty($_POST)) {

        if ($_POST["submit"] == "Add empleado") {
            echo "uwu";
            $emp_no = $_POST["emp_no"];
            $birth_date	= $_POST["birth_date"];
            $first_name	= $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $gender = $_POST["gender"];
            $dept_no = getDeptName($_POST["dept_no"]);
            $salario = $_POST["salary"];
            $title = $_POST["title"];

            $infoEmpleado = array("emp_no" => $emp_no, "first_name" => $first_name, "last_name" => $last_name, "birth_date" => $birth_date, "gender" => $gender, "salary" => $salary, "dept_name" => $dept_name, "title" => $title);

            if (!isset($_SESSION["empleados"]) || empty($_SESSION["empleados"])) {
                // Si es el primer empleado que se añade:
                $_SESSION["empleados"] = array( $infoEmpleado );
            } else {
                array_push($_SESSION["empleados"], array($infoEmpleado) );
            }
        } else if ($_POST["submit"] == "Dar de alta") {

            require_once("../models/altaEmpMasivaModel.php");

            $arrayEmpleados = $_SESSION["empleados"];

            foreach ($arrayEmpleados as $emp) {
                darAltaEmpleado($emp["nacimiento"], $emp["nombre"], $emp["apellidos"], $emp["genero"], $emp["departamento"], $emp["salario"], $emp["titulo"]);
            }

            $_SESSION["empleados"] = array();

        }
    }
    require_once("../views/altaEmpMasivaView.php");

?>