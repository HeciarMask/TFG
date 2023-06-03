<?php
function comprobar_sesion(){
	session_start();
	if(!isset($_SESSION['correo'])){	
		header("Location: index.php?redirigido=true");
	}		
}

