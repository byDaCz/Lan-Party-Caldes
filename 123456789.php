<HTML LANG="es">
<HEAD>
   <TITLE>Inserción de nueva noticia</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<?PHP
// Obtener valores introducidos en el formulario
   $insertar = $_REQUEST['insertar'];
   $titulo = $_REQUEST['titulo'];
   $texto = $_REQUEST['texto'];
   $categoria = $_REQUEST['categoria'];
   $error = false;
   if (isset($insertar))
   {
   // Comprobar que se han introducido todos los datos obligatorios
   // Título
      if (trim($titulo) == "")
      {
         $errores["titulo"] = "¡Debe introducir el título de la noticia!";
         $error = true;
      }
      else
         $errores["titulo"] = "";
   // Texto
      if (trim($texto) == "")
      {
         $errores["texto"] = "¡Debe introducir el texto de la noticia!";
         $error = true;
      }
      else
         $errores["texto"] = "";
   }
// Si los datos son correctos, procesar formulario
   if (isset($insertar) && $error==false)
   {
   // Insertar la noticia en la Base de Datos
      $conexion = mysqli_connect ("mysql.hostinger.es", "u870310186_clase", "clase1234","u870310186_clase")
         or die ("No se puede conectar con el servidor");
  
      $fecha = date ("Y-m-d"); // Fecha actual
      $instruccion = "insert into noticias (titulo, texto, categoria, fecha) values ('$titulo', '$texto', '$categoria', '$fecha')";
      $consulta = mysqli_query ($conexion, $instruccion)
         or die ("Fallo en la consulta");
      mysqli_close ($conexion);
   // Mostrar datos introducidos
      print ("<H1>Gestión de noticias</H1>\n");
      print ("<H2>Resultado de la inserción de nueva noticia</H2>\n");
      print ("La noticia ha sido recibida correctamente:");
      print ("<UL>");
      print ("<LI>Título: " . $titulo);
      print ("<LI>Texto: " . $texto);
      print ("<LI>Categoría: " . $categoria);
      print ("<LI>Fecha: " . $fecha);
      print ("<BR>");
      print ("[ <A HREF='07_inserta.php'>Insertar otra noticia</A> ]");
   }
   else
   {
?>
<H1>Inserción de nueva noticia</H1>
<FORM CLASS="borde" ACTION="07_inserta.php" NAME="inserta" METHOD="POST"
   ENCTYPE="multipart/form-data">
<!-- Título de la noticia -->
<P><LABEL>Título: *</LABEL>
<INPUT TYPE="TEXT" NAME="titulo" SIZE="50" MAXLENGTH="50"
<?PHP
   if (isset($insertar))
      print ("VALUE='$titulo'>\n");
   else
      print (">\n");
   if ($errores["titulo"] != "")
      print ("<BR><SPAN CLASS='error'>" . $errores["titulo"] . "</SPAN>");
?>
</P>
<!-- Texto de la noticia-->
<P><LABEL>Texto: *</LABEL>
<TEXTAREA COLS="45" ROWS="5" NAME="texto">
<?PHP
   if (isset($insertar))
      print ("$texto");
   print ("</TEXTAREA>");
   if ($errores["texto"] != "")
      print ("<BR><SPAN CLASS='error'>" . $errores["texto"] . "</SPAN>");
?>
</P>
<!-- Categoría de la noticia-->
<P><LABEL>Categoría:</LABEL>
<SELECT NAME="categoria">
   <OPTION SELECTED>promociones
   <OPTION>ofertas
   <OPTION>costas
</SELECT></P>
<!-- Botón de envío -->
<P><INPUT TYPE="SUBMIT" NAME="insertar" VALUE="Insertar noticia"></P>
</FORM>
<?PHP
   }
?>
</BODY>
</HTML>
