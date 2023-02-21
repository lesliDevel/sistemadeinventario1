
<?php

//include 'controladores/myalert.php'; 
//include 'myalert.php'; 
//include_once 'myalert.php'; 

class ControladorUsuarios{


	static public function ctrIngresarUsuario(){ //creamos la funcion ctrIngresarUsuario

		if(isset($_POST["ingresoUsuario"])) { //DECIMOS que si el input ingresoUsuario se envia por el post,entonces que me ejecute el siguiente codigo:

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoUsuario"])) { //lo que hace preg_match es hacer una comparacion y busquedad,basicamente lo que hara sera buscar estos caracteres especiales en el formulario que estamos enviando.

					$encriptar = crypt($_POST["password"],'lgLK6A2NyAvNB+Ehl1FZYrPQJf9MGLYO9jKlZljBQ18'); //ESTO lo que hara sera encriptar el password recibido por el formulario,nuevamente con la linea de encriptacion que usamos ya anteriormente
				
					$tabla = "usuarios";

					$item = "usuario"; //item

					$valor = $_POST['ingresoUsuario']; //el valor que viene siendo el formulario que estamos enviando

					$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor); //aqui lo que hacemos es llamar a la funcion ctrMostrarUsuarios y le mandamos los parametros item y el parametro valor,que contiene el formulario.Lo que hara esto sera que ira a ctrMostrarUsuarios,que a su vez llamara a la funcion mdlMostrarUsuarios,a la cual se le pasaran los parametros tabla,item y valor,con los cuales hara la consulta usando el item para buscar con el la fila o el registro que coincide con el item,una vez que encuentre el registro que coincide,lo trae para aca y lo compara con los datos que nosotros estamos enviando por el formulario,en este caso,el usuario y la password

					//VALIDACION:
					if ($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptar) { //decimos que si la respuesta,"usuario",es igual a el input ingresoUsuario o formulario y password del formulario es igual a el contenido de la variable encriptar,que seria la contraseña encriptada,entonces que proceda con el siguiente codigo,basicamente lo que hacemos aqui es comparar que el usuario traido de mdlMostrarUsuarios sea igual a el usuario que esta ingresando por el formulario y que la password del usuario traido desde mdlMostrarUsuarios,que ya viene encriptada,porque se almacena en la base de datos encriptada,sea igual a la password que esta ingresando por el formulario

					//$_SESSION es un array especial utilizado para guardar información a través de los requests que un usuario hace durante su visita a un sitio web o aplicación. La información guardada en una sesión puede llamarse en cualquier momento mientras la sesión esté abierta.

					//USAREMOS LA FUNCION SESSION PARA ESTO:

					//SI TODO ESTO ES CORRECTO YO TENGO QUE INICIAR SESION
						$_SESSION['iniciarSesion'] = "ok";
						$_SESSION['id'] = $respuesta["id"];
						$_SESSION['nombre'] = $respuesta["nombre"];
						$_SESSION['usuario'] = $respuesta["usuario"];
						$_SESSION['perfil'] = $respuesta["perfil"];

						echo "<script>

								
                window.location = 'index.php'; 
            

							</script>";


						
					}else{

							echo '<br><div class = "alert alert-danger">Error al ingresar,vuelva a intentarlo</div>';

						

					}


			}


		}





	}



	 //"https://unpkg.com/sweetalert/dist/sweetalert.min.js">

//NOTA:Para el error de sql,que no me deja agregar ningun usuario,solo debemos ir a sql,cambiamos id por ID,guardamos los cambios,luego volvemos a cambir a "id",y ahi estara funcionando bien.

	static public function ctrCrearUsuarios(){

		if (isset($_POST['usuario'])) { //en este if,ponemos la condicion de que si se esta enviando la informacion del formulario,la cual se esta enviando por medio de un post,que se ejecute el siguiente codigo:

			$tabla = "usuarios"; //en esta variable guardamos el nombre de la tabla en la que se almacenara la informacion del registro que estamos enviando

			$encriptar = crypt($_POST["password"],'lgLK6A2NyAvNB+Ehl1FZYrPQJf9MGLYO9jKlZljBQ18'); //ESTO VA A ENCRIPTAR la contraseña,tambien pasamos la cadena de caracteres con las que yo quiero que se encripten las contraseñas de nuestra aplicacion web

			//AQUI CREAMOS UN ARRAY,que se va a llenar con la informacion enviada por el formulario
			$datos = array( 'nombre' => $_POST['nombre'],
							'usuario' => $_POST['usuario'],
							'password' => $encriptar,
							'perfil' => $_POST['perfil']);

			//var_dump($datos);

			$respuesta = ModeloUsuarios::mdlGuardarUsuarios($tabla,$datos); //todo esto lo mandaremos por medio de la variable respuesta a la funcion mdlGuardarUsuarios,que se encuentra en la clase ModeloUsuarios,le mandamos a esa funcion las variables tabla,que contiene el nombre de la tabla que esta en la base de datos en donde se va a guardar la informacion y la variable datos que contiene el array en el que se van a almacenar todos los datos del registro,esas variabes seran los parametros de la funcion mdlGuardarUsuarios,alla en esa funcion seran recibidas por variables con el mismo nombre en la seccion de parametros de esa funcion o metodo.


			if($respuesta == "ok"){ //en el caso de que si se logre completar la accion correctamente saldra este mensaje en pantalla:

				//echo "Usuario registrado";
				//redireccionamos a el usuario a la pagina usuarios,para asi lograr que la pagina se refresque,de esta manera evitando el error en el que solo se ve la tabla y permitiendo que no sea para el usuario necesario refrescar la pagina manualmente para ver los nuevos registros.
				//echo "$respuesta";
				//echo '<script>', 'alertagregar();', '</script>';
				 //echo "onload='alertagregar()'";
				//alertagregar();
				 
				
				//<body onload="alertagregar();">
				//echo "<script>window.location.href = 'controladores/mialerta.php'</script>";
				echo '<script>

								swal({
                icon: "success",
                title: "Buen trabajo!",
                text: "Usuario registrado con exito!"
                

              }).then(function() { 
                window.location.href = "usuarios"; 
            });

							</script>';
				
				

			}else{ //DE LO CONTRARIO,se imprimira este mensaje
				 	//echo "$respuesta";
				 //echo '<script>', 'alerterroragregar();', '</script>';
				  //echo "onload='alerterroragregar()'";
				//alerterroragregar();
				//echo "<script>window.location.href = 'usuarios'</script>";
				//echo "window.location.href="./index.php";
				
				//<body onload="alerterroragregar();">
				//echo "<script>window.location.href = 'controladores/mialertaerror.php'</script>";
				echo '<script>

								swal({
                icon: "error",
                title: "Oops...!",
                text: "No se pudo realizar el registro exitosamente,verifique que el usuario no sea igual a uno que ya este registrado!"
                

              }).then(function() { 
                window.location.href = "usuarios"; 
            });

							</script>';
					
			}



			

		}






	}


	//PEGAR AQUI:

	//mostrar usuarios,lo que hara el siguiente codigo sera traer y mostrar la informacion de los usuarios que
	//esta guardada en la base de datos.

//desde usuarios.php,se hace el envio de dos variables vacias,o que contienen solamente un null a esta funcion,estas variables se llaman item y valor,se almacena el null en los correspondientes parametros
	
static public function ctrMostrarUsuarios($item,$valor){ //estas dos variables seran los parametros de esta funcion,asi se escriben las variables en php,el signo del dolar y luego el nombre de la variable.

		//asignamos el nombre de la tabla en una variable llamada tabla,es decir,ahi almacenamos el nombre de la tabla
		$tabla = "usuarios"; //aqui decimos basicamente que la variable tabla es igual a el string o cadena,usuarios,es decir,que contiene el string.Recordemos que el nombre de la tabla que creamos en la base de datos es usuarios.

	//aqui en la variable respuesta,hacemos el llamado a la funcion mdlMostrarUsuarios y le mandamos 3 variables como parametros,la var tabla que contiene el nombre de la tabla,la var item que contiene un null,la var valor,que contiene un null tambien.
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor); //aqui decimos que la variable respuesta es igual a la clase ModeloUsuarios,la cual contiene la funcion mdlMostrarUsuarios,a la cual estamos llamando para que se ejecute y le mandamos 3 parametros,que son las 3 variables,tabla que es un string y item y valor.Recuerda que llamamos a la funcion mdlMostrarUsuarios para que la conexion la base de datos sea establecida y se pueda hacer la consulta

		return $respuesta; //retornamos la respuesta que voy a obtener de la base de datos.




	}



	//PEGAR AQUI:

	static public function ctrEditarUsuarios(){

		if (isset($_POST['editarUsuario'])) { //en este if,ponemos la condicion de que si se esta enviando la informacion del formulario,la cual se esta enviando por medio de un post,que se ejecute el siguiente codigo:
			
			//$editar = AjaxUsuarios::AjaxEditarUsuarios();

			$tabla = "usuarios"; //en esta variable guardamos el nombre de la tabla en la que se almacenara la informacion del registro que estamos enviando
			//alert("El nombre de la tabla es".$tabla);
			//echo "$tabla";
			//echo Console::log('Elnombredelatablaes',$tabla);

			$encriptar = crypt($_POST["editarPassword"],'lgLK6A2NyAvNB+Ehl1FZYrPQJf9MGLYO9jKlZljBQ18'); //ESTO VA A ENCRIPTAR la contraseña,tambien pasamos la cadena de caracteres con las que yo quiero que se encripten las contraseñas de nuestra aplicacion web

			//AQUI CREAMOS UN ARRAY,que se va a llenar con la informacion enviada por el formulario
			$datos= array(	'id' => $_POST['id'],
							'nombre' => $_POST['editarNombre'],
							'usuario' => $_POST['editarUsuario'],
							'password' => $encriptar,
							'perfil' => $_POST['editarPerfil']);
			//alert($datos);
			//echo Console::log($datos);
			//echo "[$datos]";
			//var_dump($datos);

			$respuesta= ModeloUsuarios::mdlEditarUsuarios($tabla,$datos); //todo esto lo mandaremos por medio de la variable respuesta a la funcion mdlEditarUsuarios,que se encuentra en la clase ModeloUsuarios,le mandamos a esa funcion las variables tabla,que contiene el nombre de la tabla que esta en la base de datos en donde se va a guardar la informacion y la variable datos que contiene el array en el que se van a almacenar todos los datos del que mandamos ya editados,esas variabes seran los parametros de la funcion mdlEditarUsuarios,alla en esa funcion seran recibidas por variables con el mismo nombre en la seccion de parametros de esa funcion o metodo.


			if($respuesta=="ok"){ //en el caso de que si se logre completar la accion correctamente saldra este mensaje en pantalla:
				//alert("la respuesta es:".$respuesta);
				 //echo Console::log($respuesta);
				  //echo "Usuario modificado";
				//echo "La respuesta es".$respuesta;
				//redireccionamos a el usuario a la pagina usuarios,para asi lograr que la pagina se refresque,de esta manera evitando el error en el que solo se ve la tabla y permitiendo que no sea para el usuario necesario refrescar la pagina manualmente para ver la edicion de los registros.
				  //echo "<script>window.location.href = 'controladores/mialertaeditar.php'</script>";
				echo '<script>

								swal({
                icon: "success",
                title: "Buen trabajo!",
                text: "El usuario ha sido modificado correctamente!"
                

              }).then(function() { 
                window.location.href = "usuarios"; 
            });

							</script>';
				

			}else{ 
				//alert("$respuesta");
				 //echo Console::log($respuesta);
				 //echo "Usuario no modificado";
				//echo "$respuesta";
					//echo "<script>window.location.href = 'controladores/mialertaeditarerror.php'</script>";
				echo '<script>

								swal({
                icon: "error",
                title: "Oops...!",
                text: "No se pudo modificar el registro exitosamente,verifique que el usuario no sea igual a uno que ya este registrado!"
                

              }).then(function() { 
                window.location.href = "usuarios"; 
            });

							</script>';
				
				
				
				
			}



			

		}






	}





	








	static public function ctrBorrarUsuarios(){


	if(isset($_GET["idUsuario"])){ //le decimos que si obtenemos idUsuario,que es cuando damos en el boton eliminar,entonces que ejeciute lo siguiente:

		$tabla = "usuarios"; //metemos el nombre de la tabla en esta variable

		$datos = $_GET['idUsuario']; //decimos que la variable datos es igual a get idUsuarios,asi que aqui lo que hacemos es obtener el id del usuario que vamos a eliminar y lo almacenamos en esta variable llamada datos

		$respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla,$datos); //y aqui en la variable respuesta,lo que vamos a hacer es llamar a la clase ModeloUsuarios,en la que esta la funcion mdlBorrarUsuarios,a la cual vamos a mandarle los parametros tabla,que contiene el nombre de la tabla y datos,que contiene el id del usuarios que vamos a eliminar

		if($respuesta=="ok"){ //en el caso de que si se logre completar la accion correctamente saldra este mensaje en pantalla:
				//alert("la respuesta es:".$respuesta);
				 //echo Console::log($respuesta);
				  //echo "Usuario modificado";
				//echo "La respuesta es".$respuesta;
				//redireccionamos a el usuario a la pagina usuarios,para asi lograr que la pagina se refresque,de esta manera evitando el error en el que solo se ve la tabla y permitiendo que no sea para el usuario necesario refrescar la pagina manualmente para ver la edicion de los registros.
				  //echo "<script>window.location.href = 'controladores/mialertaeditar.php'</script>";
			 		//echo "Usuario eliminado";
			 		//echo "<script>window.location.href = 'usuarios'</script>";
					echo '<script>

								swal({
                icon: "success",
                title: "Buen trabajo!",
                text: "El usuario ha sido eliminado con exito!"
                

              }).then(function() { 
                window.location.href = "usuarios"; 
            });

							</script>';

			}else{ 
				//alert("$respuesta");
				 //echo Console::log($respuesta);
				 //echo "Usuario no modificado";
				//echo "$respuesta";
					//echo "<script>window.location.href = 'controladores/mialertaeditarerror.php'</script>";
				//echo "Usuario no eliminado";
				//echo "<script>window.location.href = 'usuarios'</script>";
				echo '<script>

								swal({
                icon: "error",
                title: "opss!",
                text: "No se pudo eliminar el registro de manera exitosa!"
                

              }).then(function() { 
                window.location.href = "usuarios"; 
            });

							</script>';
				
				
				}




		}


	}

}


  ?>


