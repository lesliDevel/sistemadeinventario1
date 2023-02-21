<?php

//include 'controladores/myalert.php'; 
//include 'myalert.php'; 
//include_once 'myalert.php'; 

class ControladorEntradas{



	 //"https://unpkg.com/sweetalert/dist/sweetalert.min.js">

//NOTA:Para el error de sql,que no me deja agregar ningun usuario,solo debemos ir a sql,cambiamos id por ID,guardamos los cambios,luego volvemos a cambir a "id",y ahi estara funcionando bien.

	


	//PEGAR AQUI:

	//mostrar usuarios,lo que hara el siguiente codigo sera traer y mostrar la informacion de los usuarios que
	//esta guardada en la base de datos.

//desde usuarios.php,se hace el envio de dos variables vacias,o que contienen solamente un null a esta funcion,estas variables se llaman item y valor,se almacena el null en los correspondientes parametros
	
static public function ctrMostrarEntradas($item,$valor){ //estas dos variables seran los parametros de esta funcion,asi se escriben las variables en php,el signo del dolar y luego el nombre de la variable.

		//asignamos el nombre de la tabla en una variable llamada tabla,es decir,ahi almacenamos el nombre de la tabla
		$tabla ="entradap"; //aqui decimos basicamente que la variable tabla es igual a el string o cadena,usuarios,es decir,que contiene el string.Recordemos que el nombre de la tabla que creamos en la base de datos es usuarios.

	//aqui en la variable respuesta,hacemos el llamado a la funcion mdlMostrarUsuarios y le mandamos 3 variables como parametros,la var tabla que contiene el nombre de la tabla,la var item que contiene un null,la var valor,que contiene un null tambien.
		$respuesta = ModeloEntradas::mdlMostrarEntradas($tabla,$item,$valor); //aqui decimos que la variable respuesta es igual a la clase ModeloUsuarios,la cual contiene la funcion mdlMostrarCategorias,a la cual estamos llamando para que se ejecute y le mandamos 3 parametros,que son las 3 variables,tabla que es el nombre de la tabla y item y valor.Recuerda que llamamos a la funcion mdlMostrarCategorias para que la conexion la base de datos sea establecida y se pueda hacer la consulta

		return $respuesta; //retornamos la respuesta que voy a obtener de la base de datos.




	}


	static public function ctrMostrarSalidas($item,$valor){ //estas dos variables seran los parametros de esta funcion,asi se escriben las variables en php,el signo del dolar y luego el nombre de la variable.

		//asignamos el nombre de la tabla en una variable llamada tabla,es decir,ahi almacenamos el nombre de la tabla
		$tabla ="salidap"; //aqui decimos basicamente que la variable tabla es igual a el string o cadena,usuarios,es decir,que contiene el string.Recordemos que el nombre de la tabla que creamos en la base de datos es usuarios.

	//aqui en la variable respuesta,hacemos el llamado a la funcion mdlMostrarUsuarios y le mandamos 3 variables como parametros,la var tabla que contiene el nombre de la tabla,la var item que contiene un null,la var valor,que contiene un null tambien.
		$respuesta = ModeloEntradas::mdlMostrarSalidas($tabla,$item,$valor); //aqui decimos que la variable respuesta es igual a la clase ModeloUsuarios,la cual contiene la funcion mdlMostrarCategorias,a la cual estamos llamando para que se ejecute y le mandamos 3 parametros,que son las 3 variables,tabla que es el nombre de la tabla y item y valor.Recuerda que llamamos a la funcion mdlMostrarCategorias para que la conexion la base de datos sea establecida y se pueda hacer la consulta

		return $respuesta; //retornamos la respuesta que voy a obtener de la base de datos.




	}



	


}


  ?>


