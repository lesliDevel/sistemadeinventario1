
<?php

			
//aqui deben ir todos los controladores


require_once "controladores/plantilla.controlador.php"; //para poder llamar a la clase ControladorPlantilla debemos primero dar la ubicacion exacta del archivo que contiene la clase,eso es lo que hacemos aqui,le decimos que requerimos el archivo plantilla.controlador.php,dandole exactamente su ubicacion.

require_once "controladores/usuarios.controlador.php";//llamamos a el archivo usuarios.controlador.php,es decir,estamos integrando la funcion de mostrar usuarios a la aplicacion.


require_once "controladores/categorias.controlador.php";

require_once "controladores/productos.controlador.php";

require_once "controladores/entradas.controlador.php";





//require_once "controladoreditar/usuarios.editar.php";



//require_once "controladores/usuarios.controlador.mostrar.php";


require_once "modelos/usuarios.modelo.php";//llamamos a el archivo usuarios.modelo.php,el cual esta en la carpeta MODELOS y contiene a la clase ModeloUsuarios,la cual contiene a la funcion o metodo mdlMostrarUsuarios,la cual se encarga de llamar a la funcion que establece la conexion con la base de datos,la cual se llama conectar y esta en la clase Conexion.

require_once "modelos/categorias.modelo.php";

require_once "modelos/productos.modelo.php";

require_once "modelos/entrada.modelo.php";


$plantilla = new ControladorPlantilla(); //creamos la variable plantilla,luego decimos que la variable plantilla es igual a la clase controladorPlantilla.
$plantilla->Plantilla(); //llamos a la funcion plantilla,la cual esta en la clase ControladorPlantilla,la cual lo que hara
//sera llamar a plantilla.php,la cual contiene la plantilla de Adminlt en la cual vamos a construir el inventario.

?>