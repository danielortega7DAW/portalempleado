<?php
	
	function obtainEmployees(){
		
		global $conexion;
		
		$sql = "SELECT first_name from employees limit 100";
		
		foreach ($conexion->query($sql) as $row) {
            $employees[]=$row['first_name'];   
    
		}
		return $employees;
	}
?>