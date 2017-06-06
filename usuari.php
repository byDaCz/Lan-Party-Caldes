<?php

$nom = $_REQUEST['nom'];
$contacte = $_REQUEST['contacte'];
$error = false;


if ($error==false ) {
	$conexion = mysqli_connect ("mysql.hostinger.es", "u870310186_clase", "clase1234","u870310186_clase")
         or die ("No se puede conectar con el servidor");
    $instruccion = "SELECT id FROM `users` WHERE nom='" . $nom . "' and contacte='" . $contacte . "';";
    $consulta = mysqli_query ($conexion, $instruccion)
         or die ("Fallo en la consulta");
     if (mysqli_num_rows ($consulta)) {
     	 header('Location: activitats.html');
     }
    else
	{
	header('Location: index.html');
	}
}

else
	{
		echo $nom;
		echo $contacte;
	//header('Location: index.html');
	}

?>