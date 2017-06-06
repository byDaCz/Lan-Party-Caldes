<?php  
	// Obtener valores introducidos en el formulario
   $nom = $_REQUEST['nom'];
   $contacte = $_REQUEST['contacte'];
   $torneig = $_REQUEST['torneig'];
   $text = $_REQUEST['text'];


   $error = false;
   // Comprobar que se han introducido todos los datos obligatorios
   // Título
  if (trim($nom) == "")
  {
     $errores["nom"] = "¡Has d'introduir un nom d'usuari!";
     $error = true;
  }
  else
     $errores["nom"] = "";

 // Contacte
  if (trim($contacte) == "")
  {
     $errores["contacte"] = "¡Has d'introduir un correu valid";
     $error = true;
  }
  else
     $errores["contacte"] = "";

// Texto
  if (trim($text) == "")
  {
     $errores["text"] = "Introdueix aquí els nicks dels usuaris participants";
     $error = true;
  }
  else
     $errores["text"] = "";

// Si los datos son correctos, procesar formulario
   if ($error==false)
   {
   // Insertar la noticia en la Base de Datos
      $conexion = mysqli_connect ("mysql.hostinger.es", "u870310186_clase", "clase1234","u870310186_clase")
         or die ("No se puede conectar con el servidor");
  
      $fecha = date ("Y-m-d"); // Fecha actual
      $instruccion = "insert into users (nom, contacte, torneig, text) values ('$nom', '$contacte', '$torneig', '$text')";
      $consulta = mysqli_query ($conexion, $instruccion)
         or die ("Fallo en la consulta");
      mysqli_close ($conexion);
      header('Location: index.html');
    }

    else{
    	header('Location: error.html');
    }
 
   



?>