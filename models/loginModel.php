<?php

function user(){ 
/*
Funcion user()

Crea la sesion para el registro, llama a comrpobarLogin() y
reenvia la página a inicio_view
*/
	
	session_start();
	
	if(isset($_SESSION["usuario"])){
		session_unset();
		session_destroy();
	}
	if(isset($_SESSION["admin"])){
		session_unset();
		session_destroy();
	}
	
	if (isset($_POST) && !empty($_POST)) {

		$user = $_POST["username"];
		$pass = $_POST["passcode"];
		
		$consulta = comprobarLogin($user, $pass);
		$consultaAdmin = comprobarAdmin($user);
		
		if($consultaAdmin != null){
			$_SESSION["admin"] = $consultaAdmin["emp_no"];
			header("location: views/inicioView.php");
		}
		
		if($consulta != null){
			$_SESSION["usuario"] = $consulta["emp_no"];
			header("location: views/inicioView.php");
		}	
		
		
	}
	
}

function comprobarLogin($user, $pass) {
	
/*
Funcion comprobarLogin($user, $pass)
Parametros: usuario y contraseña

Realiza un select para comprobar si el usuario (Email)
coincide con la contraseña (LastName)

Retorna $datos[i]
*/
		global $conexion;
	try {
		$consulta = $conexion->prepare("SELECT emp_no, last_name FROM employees WHERE emp_no = :username");
		$consulta->bindParam(":username", $user);
		$consulta->execute();
		$datos = $consulta -> fetchAll(PDO::FETCH_ASSOC);

		if($datos!==null){
			for ($i=0; $i<count($datos); $i++){

				if($datos[$i]["last_name"]==$pass){
					return $datos[$i];
				}
			}

			return null;
		}else{
			return null;
		}

	} catch (PDOException $ex) {
		echo "<p>Ha ocurrido un error al devolver los datos. <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
		return null;
	}
}

function comprobarAdmin($user) {
	global $conexion;
	try {
		$rrhh = "d003";
		$consultaAdmin = $conexion->prepare("SELECT emp_no, dept_no FROM dept_emp WHERE dept_no = :recursos");
		$consultaAdmin->bindParam(":recursos", $rrhh);
		$consultaAdmin->execute();
		$datosAdmin = $consultaAdmin -> fetchAll(PDO::FETCH_ASSOC);
			
		if($datosAdmin!==null){
			for ($i=0; $i<count($datosAdmin); $i++){
				if($datosAdmin[$i]["dept_no"]==$rrhh){
					return $datosAdmin[$i];
				}
			}
			return null;
		}
	} catch (PDOException $ex) {
		echo "<p>Ha ocurrido un error al devolver los datos. <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
			return null;
	}	
}
?>