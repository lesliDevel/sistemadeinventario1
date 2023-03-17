<?php

//include 'controladores/myalert.php'; 
//include 'myalert.php'; 
//include_once 'myalert.php'; 

class ControladorCategorias{



	 //"https://unpkg.com/sweetalert/dist/sweetalert.min.js">

//NOTA:Para el error de sql,que no me deja agregar ningun usuario,solo debemos ir a sql,cambiamos id por ID,guardamos los cambios,luego volvemos a cambir a "id",y ahi estara funcionando bien.

	static public function ctrCrearCategorias(){

		if (isset($_POST['nombrecategoria'])) { //en este if,ponemos la condicion de que si se esta enviando la informacion del formulario,la cual se esta enviando por medio de un post,que se ejecute el siguiente codigo:

			$tabla = "categorias"; //en esta variable guardamos el nombre de la tabla en la que se almacenara la informacion del registro que estamos enviando

			

			//AQUI CREAMOS UN ARRAY,que se va a llenar con la informacion enviada por el formulario
			$datos = array( 'nombre' => $_POST['nombrecategoria']);

			//var_dump($datos);

			$respuesta = ModeloCategorias::mdlGuardarCategorias($tabla,$datos); //todo esto lo mandaremos por medio de la variable respuesta a la funcion mdlGuardarUsuarios,que se encuentra en la clase ModeloUsuarios,le mandamos a esa funcion las variables tabla,que contiene el nombre de la tabla que esta en la base de datos en donde se va a guardar la informacion y la variable datos que contiene el array en el que se van a almacenar todos los datos del registro,esas variabes seran los parametros de la funcion mdlGuardarUsuarios,alla en esa funcion seran recibidas por variables con el mismo nombre en la seccion de parametros de esa funcion o metodo.


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
                text: "La categoria ha sido registrada exitosamente!"
                

              }).then(function() { 
                window.location.href = "categorias"; 
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
                text: "No se pudo realizar el registro de la categoria exitosamente,recuerde que no puede registrar nuevamente una categoria que ya existe!"
                

              }).then(function() { 
                window.location.href = "categorias"; 
            });

							</script>';
					
			}



			

		}






	}


	//PEGAR AQUI:

	//mostrar usuarios,lo que hara el siguiente codigo sera traer y mostrar la informacion de los usuarios que
	//esta guardada en la base de datos.

//desde usuarios.php,se hace el envio de dos variables vacias,o que contienen solamente un null a esta funcion,estas variables se llaman item y valor,se almacena el null en los correspondientes parametros
	
static public function ctrMostrarCategorias($item,$valor){ //estas dos variables seran los parametros de esta funcion,asi se escriben las variables en php,el signo del dolar y luego el nombre de la variable.

		//asignamos el nombre de la tabla en una variable llamada tabla,es decir,ahi almacenamos el nombre de la tabla
		$tabla ="categorias"; //aqui decimos basicamente que la variable tabla es igual a el string o cadena,usuarios,es decir,que contiene el string.Recordemos que el nombre de la tabla que creamos en la base de datos es usuarios.

	//aqui en la variable respuesta,hacemos el llamado a la funcion mdlMostrarUsuarios y le mandamos 3 variables como parametros,la var tabla que contiene el nombre de la tabla,la var item que contiene un null,la var valor,que contiene un null tambien.
		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla,$item,$valor); //aqui decimos que la variable respuesta es igual a la clase ModeloUsuarios,la cual contiene la funcion mdlMostrarCategorias,a la cual estamos llamando para que se ejecute y le mandamos 3 parametros,que son las 3 variables,tabla que es el nombre de la tabla y item y valor.Recuerda que llamamos a la funcion mdlMostrarCategorias para que la conexion la base de datos sea establecida y se pueda hacer la consulta

		return $respuesta; //retornamos la respuesta que voy a obtener de la base de datos.




	}



	//PEGAR AQUI:

	static public function ctrEditarCategorias(){

		if (isset($_POST['editarCategoria'])) { //en este if,ponemos la condicion de que si se esta enviando la informacion del formulario,la cual se esta enviando por medio de un post,que se ejecute el siguiente codigo:
			
			//$editar = AjaxUsuarios::AjaxEditarUsuarios();

			$tabla = "categorias"; //en esta variable guardamos el nombre de la tabla en la que se almacenara la informacion del registro que estamos enviando
			//alert("El nombre de la tabla es".$tabla);
			//echo "$tabla";
			//echo Console::log('Elnombredelatablaes',$tabla);

			

			//AQUI CREAMOS UN ARRAY,que se va a llenar con la informacion enviada por el formulario
			$datos= array(	'id' => $_POST['idcategoria'],
							'nombre' => $_POST['editarCategoria']);
			//alert($datos);
			//echo Console::log($datos);
			//echo "[$datos]";
			//var_dump($datos);

			$respuesta= ModeloCategorias::mdlEditarCategorias($tabla,$datos); //todo esto lo mandaremos por medio de la variable respuesta a la funcion mdlEditarUsuarios,que se encuentra en la clase ModeloUsuarios,le mandamos a esa funcion las variables tabla,que contiene el nombre de la tabla que esta en la base de datos en donde se va a guardar la informacion y la variable datos que contiene el array en el que se van a almacenar todos los datos del que mandamos ya editados,esas variabes seran los parametros de la funcion mdlEditarUsuarios,alla en esa funcion seran recibidas por variables con el mismo nombre en la seccion de parametros de esa funcion o metodo.


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
                text: "La categoria ha sido modificada correctamente!"
                

              }).then(function() { 
                window.location.href = "categorias"; 
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
                text: "No se pudo modificar el registro exitosamente,verifique que la categoria no sea igual a una que ya este registrada!"
                

              }).then(function() { 
                window.location.href = "categorias"; 
            });

							</script>';
				
				
				
				
			}



			

		}






	}





	








	static public function crtBorrarCategorias(){

	if($_SESSION['perfil'] == "Admin"){
			if(isset($_GET["idCategoria"])){ //le decimos que si obtenemos idUsuario,que es cuando damos en el boton eliminar,entonces que ejeciute lo siguiente:

				$tabla = "categorias"; //metemos el nombre de la tabla en esta variable

				$datos = $_GET['idCategoria']; //decimos que la variable datos es igual a get idUsuarios,asi que aqui lo que hacemos es obtener el id del usuario que vamos a eliminar y lo almacenamos en esta variable llamada datos

				$respuesta = ModeloCategorias::mdlBorrarCategorias($tabla,$datos); //y aqui en la variable respuesta,lo que vamos a hacer es llamar a la clase ModeloUsuarios,en la que esta la funcion mdlBorrarUsuarios,a la cual vamos a mandarle los parametros tabla,que contiene el nombre de la tabla y datos,que contiene el id del usuarios que vamos a eliminar

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
		                text: "La categoria ha sido eliminada con exito!"
		                

		              }).then(function() { 
		                window.location.href = "categorias"; 
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
		                window.location.href = "categorias"; 
		            });

									</script>';
						
						
						}




				 }

	 }else{
			echo '<script>
				     swal({
					 title: "Recordatorio",
					 text: "!!Solo el Admin puede eliminar categorias!!",
					 icon: "warning"
								});
						</script>';
					}


	}

}


  ?>


