<?php

require_once 'conexion.php'; //hacemos un require en el cual decimos que requerimos a el archivo conexion.php,ya que este archivo es el que contiene la clase conexion,la cual contiene la funcion o el metodo conectar,el cual se encarga de establecer la conexion con la base de datos.

class ModeloProductos{

	//esta funcion va a recibir a las variables tabla y datos,la variable tabla contiene el nombre de la tabla en la que se van a guardar estos datos,osea,la tabla de la base de datos y la variable datos contiene un array el cual contiene todos los datos que se enviaron en el formulario de registro de usuarios.
	static public function mdlGuardarProductos($tabla,$datos){

		//CODIGO PARA EVITAR DUPLICADOS EN EL REGISTRO DE LA BASE DE DATOS:
		//AQUI HACEMOS UNA VALIDACION CON LA VARIABLE VALIDACION,ESTA VALIDACION CONSISTE EN AVERIGUAR SI LOS DATOS INGRESADOS SON IGUALES A OTROS QUE YA ESTEN REGISTRADOS EN LA BASE DE DATOS,USANDO COMO PUNTO DE COMPARACION EL UNICO DATO QUE ES UNICO APARTE DEL ID,EL USUARIO,ES DECIR,HICIMOS A EL USUARIO UNICO,POR LO TANTO CADA USUARIO DEBE SER DIFERENTE,SI ES EL MISMO USUARIO QUE UNO QUE YA ESTA REGISTRADO,NO HARA EL REGISTRO.
		
		$validacion= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo = :codigo");
		$validacion->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
		

		
		try { //con este try and except,evitamos que la aplicacion pare de ejcutarse,por el error de que por ejemplo,un usuario,ingrese un usuario que ya existe a la hora del registro
		//aqui decimos que ejecute el resto del codigo solo si la validacion ya fue ejecutada,con esto podemos evitar los duplicados.
		if($validacion->execute()){







		

		//en la variable stmt,lo que va a pasar es que primero llamara a la funcion conectar para que haga la conexion con la base de datos,para asi poder insertar los datos que queremos insertar,decimos que inserte los datos del formulario de registro de usuarios en la tabla por medio de la instruccion insert
		//$myvar = "index";
		//$stmt = Conexion::conectar()->prepare("ALTER TABLE  $tabla ORDER BY $myvar;");
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcategoria,codigo,descripcion,stock,precio) VALUES(:idcategoria,:codigo,:descripcion,:stock,:precio)");

		//AQUI BASICAMENTE LO QUE VAMOS A HACER ES EXTRAER CADA UNO DE LOS DATOS DEL ARRAY EN EL ORDEN EN EL QUE FUERON INSERTADOS EN EL ARRAY:
		$stmt->bindParam(":idcategoria",$datos["idcategoria"],PDO::PARAM_INT);
		$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_INT);
		$stmt->bindParam(":precio",$datos["precio"],PDO::PARAM_STR);
		


		if ($stmt->execute()) { //aqui en if decimos que si la variable stmt se ejecuta,que me returne un ok
			
			return "ok"; //este ok se returna hacia la funcion ctrCrearUsuarios,se encarga de indicar si todo salio bien o si hubo un error,si todo salio bien,manda este ok y si sale mal,manda el "error"

		} else{ //DE LO CONTRARIO,si no se ejecuta,entonces que returne un error
			//showMessage();
			

			return "error";


		}


		
		$stmt->close();//con este comando indicamos a la aplicacion web que se debe cerrar la conexion con la base de datos por motivos de seguridad.
		
		
		$stmt->null; //aqui lo que hacemos es dejar vacia la variabke stmt haciendola igual a null,por motivos de seguridad
		
		


		
				

		
	

	}
		} catch (Exception $e){
			echo "Error inesperado,verifique que el usuario ingresado sea diferente a los que estan registrados en la base de datos:".$e;
				return "error";

		}
	

	

}



	//mostrar usuarios

//aqui llegan desde usuarios.controlador,la llamada y los parametros,los cuales se van a almacenar en los parametros de aqui,en tabla se va a almacenar el nombre de la tabla,en item la variable item,la cual es null,en valor,la variable valor,la cual es null.
	static public function mdlMostrarProductos($tabla,$item,$valor){ //declaramos esta funcion y declaramos dentro de las 
		//parentesis las variables tabla,valor e item,que seran las que van a recibir y almacenar los parametros que se
		//le envien a la funcion cuando se haga el correspondiente llamado a la funcion.

			//validamos si la variable item viene vacia o no,si es diferente a null,osea que no viene nacia,le decimos que ejecute el siguiente codigo:
			if ($item != null) { //aqui en esta condicional decimos que si la variable item es diferente a null,es decir,que si la variable item NO ESTA VACIA,entonces que ejecute el siguente codigo:
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");  //aqui decimos que la variable stmt,es igual o que contiene a la clase Conexion y a la funcion conectar,la cual se encuentra en la clase Conexion.Tambien en un prepare mandamos una instruccion a la base de datos,la mandamos como string obviamente,en esta instruccion indicamos que debe SELECCIONAR un elemento de la tabla correspondiente,que en este caso es la tabla usuarios SOLO SI ESTE elemento es igual a el elemento que esta almacenado en nuestra $item,basicamente cuando se llame a la funcion a la variable item,llegara un valor,el cual se almacena en esa variable,luego se ejecuta este codigo,el cual ira a la base datos a ejecutar la instruccion,por eso previamente llamamos a la funcion que hace la conexion con la base de datos,porque para poder hacer cualquier tipo de cambio o consulta en la base de datos,es necesario que la conexion este establecida.Notemos como en la sintaxis de php no es necesario concatenar las variables.

				$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR); //aqui la variable va a tener este bindParam,el cual va a tener el item que yo estoy enviando,tambien va a contener el valor que le estamos enviando,tambien va a contener una sentencia preparada,la cual es PDO,PDO::PARAM_STR  Representa el tipo de dato CHAR, VARCHAR de SQL, u otro tipo de datos de cadena.Una sentencia preparada (Prepared Statements) o sentencias parametrizadas es una plantilla de un query o consulta que deseamos ejecutar repetidamente una gran cantidad de veces de forma eficiente. Por lo regular ejecutamos una sentencia preparada dentro de un ciclo y es aquí donde solo variar los parámetros trae excelentes beneficios,basicamente las sentencias preparadas nos facilitan la manipulacion del sql,es decir,consultas etc,esta es una gran herramienta que contiene php.

				$stmt->execute(); //llamamos a la funcion stmt para que se ejecute,llame a las funciones que establecen la conexion y haga la consulta

				//BASICAMENTE ESTE RETURN TRAE SOLAMENTE UN ELEMENTO,ESTE SE USA CUANDO SE HACE UNA CONSULTA QUE DESEA QUE SOLO SE TRAIGA UN SOLO ELEMENTO,NORMALMALMENTE LO TRAEMOS CON ITEM,QUE ES ID,BASICAMENTE TRAEMOS EL ELEMENTO CUYO NUMERO DE ID CORRESPONDA CON EL ID QUE ESTAMOS ENVIANDO
				return $stmt->fetch();//retornamos la variable stmt,la cual va a contener el resultado de la consulta.


				//como ya sabemos que la variable item normalmente va a estar vacia,porque asi la mandamos,pues se ejecutara este else,que lo que hara sera mostrar toda la informacion de esa tabla en nuestra app,en plantilla,bueno,sola informacion que queramos mostrar.
			} else{ //aqui en la condicional else decimos que DE LO CONTRARIO,es decir,si la variable item es igual a null,es decir que esta vacia,que ejecute el siguiente codigo:
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");  //en este caso,como se supone que esta vacio (la variable item),le decimos que nos debe traer toda la informacion de la tabla.

				

				$stmt->execute(); //llamamos a la funcion stmt para que se ejecute,llame a las funciones que establecen la conexion y haga la consulta


				//Y ESTE OTRO RETURN,QUE ES EL QUE MUESTRA TODOS LOS DATOS DE LA TABLA
				return $stmt->fetchAll(); //le agregamos un All al fecth para que nos traiga toda la informacion de la tabla




			}





	}

	static public function mdlEditarProductos($tabla,$datos){ //recibimos las variables tabla y datos

		$validacion= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo = :codigo");
		$validacion->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);

		try { //con este try and except,evitamos que la aplicacion pare de ejcutarse,por el error de que por ejemplo,un usuario,ingrese un usuario que ya existe a la hora del registro
		//aqui decimos que ejecute el resto del codigo solo si la validacion ya fue ejecutada,con esto podemos evitar los duplicados.
		if($validacion->execute()){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idcategoria = :idcategoria, codigo = :codigo,descripcion = :descripcion,stock = :stock,precio = :precio WHERE id = :id"); //decimos aqui que haga un UPDATE,el UPDATE lo que hace es especifar en que tabla se quiere modificar un dato,el set se utiliza en conjunto con el UPDATE para especifcar cual sera el nuevo valor o dato y el WHERE proporciona la condicion especifica que debe cumplir el dato  de referencia del registro que se pretende modificar,en este caso seria el usuario,al ser un dato unico,esta sentencia no es obligatoria,pero si es recomendada.
		//alert($stmt);

		//AQUI BASICAMENTE LO QUE VAMOS A HACER ES EXTRAER CADA UNO DE LOS DATOS DEL ARRAY EN EL ORDEN EN EL QUE FUERON INSERTADOS EN EL ARRAY:
		$stmt->bindParam(":id",$datos["id"],PDO::PARAM_STR);
		$stmt->bindParam(":idcategoria",$datos["idcategoria"],PDO::PARAM_INT);
		$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_INT);
		$stmt->bindParam(":precio",$datos["precio"],PDO::PARAM_STR);
		
		

		if ($stmt->execute()) { //aqui en if decimos que si la variable stmt se ejecuta,que me returne un ok
			
			//$respuesta = "ok";
			//echo "$respuesta";
			//alert($respuesta);
			//echo Console::log($respuesta);
			
			return "ok"; //este ok se returna hacia la funcion ctrEditarUsuarios,se encarga de indicar si todo salio bien o si hubo un error,si todo salio bien,manda este ok y si sale mal,manda el "error"

		} else{ //DE LO CONTRARIO,si no se ejecuta,entonces que returne un error

			//$respuesta = "error";
			//echo "$respuesta";
			//echo Console::log($respuesta);
			//alert($respuesta);
			return "error";


		}


		
		$stmt->close();//con este comando indicamos a la aplicacion web que se debe cerrar la conexion con la base de datos por motivos de seguridad.
		
		
		$stmt->null; //aqui lo que hacemos es dejar vacia la variabke stmt haciendola igual a null,por motivos de seguridad
		
		//consejo: aveces si no borramos las cokies del navegador,eso nos puede dar errores


	 }




		}
		   catch (Exception $e){
				echo "Error inesperado,verifique que el usuario ingresado sea diferente a los que estan registrados en la base de datos:".$e;
					return "error";

			}




	}


	static public function mdlBorrarProductos($tabla,$datos){ //la funcion mdlBorrarUsuarios,es llamada por la funcion crtBorrarUsuarios,la cual le envia a esta funcion los parametros tabla,que contiene el nombre de la tabla y datos que contiene el id del usuario que vamos a eliminar.

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id"); //la instruccion en este caso,es para borra,decimos delete from tabla si el id es igual a id

		
		$stmt->bindParam(":id",$datos,PDO::PARAM_STR); //es es el id que vamos a usar para borrar a el usuario
		

		if ($stmt->execute()) { //aqui en if decimos que si la variable stmt se ejecuta,que me returne un ok
			
			//$respuesta = "ok";
			//echo "$respuesta";
			//alert($respuesta);
			//echo Console::log($respuesta);
			
			return "ok"; //este ok se returna hacia la funcion ctrEditarUsuarios,se encarga de indicar si todo salio bien o si hubo un error,si todo salio bien,manda este ok y si sale mal,manda el "error"

		} else{ //DE LO CONTRARIO,si no se ejecuta,entonces que returne un error

			//$respuesta = "error";
			//echo "$respuesta";
			//echo Console::log($respuesta);
			//alert($respuesta);
			return "error";


		}


		
		$stmt->close();//con este comando indicamos a la aplicacion web que se debe cerrar la conexion con la base de datos por motivos de seguridad.
		
		
		$stmt->null;







	}



//LO QUE HACE ESTA FUNCION ES GUARDAR LAS NUEVAS ENTRADAS AL STOCK,es decir,las guarda en la base de datos
	static public function mdlGuardarProductosEntrada($tabla,$datos){


		//en la variable stmt,lo que va a pasar es que primero llamara a la funcion conectar para que haga la conexion con la base de datos,para asi poder insertar los datos que queremos insertar,decimos que inserte los datos del formulario de registro de usuarios en la tabla por medio de la instruccion insert
		//$myvar = "index";
		//$stmt = Conexion::conectar()->prepare("ALTER TABLE  $tabla ORDER BY $myvar;");
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo,descripcion,nombrecategoria,entrada) VALUES(:codigo,:descripcion,:nombrecategoria,:entrada)");

		//AQUI BASICAMENTE LO QUE VAMOS A HACER ES EXTRAER CADA UNO DE LOS DATOS DEL ARRAY EN EL ORDEN EN EL QUE FUERON INSERTADOS EN EL ARRAY:
		$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_INT);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":nombrecategoria",$datos["nombrecategoria"],PDO::PARAM_INT);
		$stmt->bindParam(":entrada",$datos["entrada"],PDO::PARAM_INT);
		
		


		if ($stmt->execute()) { //aqui en if decimos que si la variable stmt se ejecuta,que me returne un ok
			
			return "ok"; //este ok se returna hacia la funcion ctrCrearUsuarios,se encarga de indicar si todo salio bien o si hubo un error,si todo salio bien,manda este ok y si sale mal,manda el "error"

		} else{ //DE LO CONTRARIO,si no se ejecuta,entonces que returne un error
			//showMessage();
			

			return "error";


		}


		
		$stmt->close();//con este comando indicamos a la aplicacion web que se debe cerrar la conexion con la base de datos por motivos de seguridad.
		
		
		$stmt->null; //aqui lo que hacemos es dejar vacia la variabke stmt haciendola igual a null,por motivos de seguridad
		
	

}



//EN LAS ENTRADAS DE STOCK,YA SEA GUARDAR O EDITAR,NO USAMOS VALIDACION,YA QUE EN LAS ENTRADAS DE STOCK LOS DATOS SIEMPRE SE VAN A REPETIR,POR LO TANTO NO DEBE SER UNICO Y ADEMAS,NO HAY RIESGO DE DUPLICADOS,YA QUE LA PAGINA SE ACTUALIZA AUTOMATICAMENTE DESPUES DE HACER CLICK EN EL ALERT

//LO QUE HACE ESTA FUNCION ES ACTUALIZAR EL STOCK

	static public function mldActualizarProductosEntrada($tablaDos,$itemDos,$valor,$resultado){

	
			//AQUI ESTA instruccion dice que debe actualizar la tabla productos,la cual esta en la variable tablaDos,luego decimos el valor que queremos actualizar o modificar,que en este caso es el stock,el cual esta en la variable item,todo esto se hara si se cumple la condicion de id sea igual a id
		$stmt = Conexion::conectar()->prepare("UPDATE $tablaDos SET $itemDos = :$itemDos  WHERE id = :id"); //decimos aqui que haga un UPDATE,el UPDATE lo que hace es especifar en que tabla se quiere modificar un dato,el set se utiliza en conjunto con el UPDATE para especifcar cual sera el nuevo valor o dato y el WHERE proporciona la condicion especifica que debe cumplir el dato  de referencia del registro que se pretende modificar,en este caso seria el usuario,al ser un dato unico,esta sentencia no es obligatoria,pero si es recomendada.
		//alert($stmt);

		//ENVIAMOS LOS DATOS,ITEM QUE ES EL STOCK Y RESULTADO QUE ES LA SUMA DEL STOCK EXISTENTE CON EL NUEVO A LA BASE DE DATOS
		$stmt->bindParam(":".$itemDos,$resultado,PDO::PARAM_STR);
		$stmt->bindParam(":id",$valor,PDO::PARAM_INT); //enviamos el id
		
		

		if ($stmt->execute()) { //aqui en if decimos que si la variable stmt se ejecuta,que me returne un ok
			
			//$respuesta = "ok";
			//echo "$respuesta";
			//alert($respuesta);
			//echo Console::log($respuesta);
			
			return "ok"; //este ok se returna hacia la funcion ctrEditarUsuarios,se encarga de indicar si todo salio bien o si hubo un error,si todo salio bien,manda este ok y si sale mal,manda el "error"

		} else{ //DE LO CONTRARIO,si no se ejecuta,entonces que returne un error

			//$respuesta = "error";
			//echo "$respuesta";
			//echo Console::log($respuesta);
			//alert($respuesta);
			return "error";


		}


		
		$stmt->close();//con este comando indicamos a la aplicacion web que se debe cerrar la conexion con la base de datos por motivos de seguridad.
		
		
		$stmt->null; //aqui lo que hacemos es dejar vacia la variabke stmt haciendola igual a null,por motivos de seguridad
		
		//consejo: aveces si no borramos las cokies del navegador,eso nos puede dar errores


	 




	}


	static public function mdlGuardarProductosSalida($tabla,$datos){


		//en la variable stmt,lo que va a pasar es que primero llamara a la funcion conectar para que haga la conexion con la base de datos,para asi poder insertar los datos que queremos insertar,decimos que inserte los datos del formulario de registro de usuarios en la tabla por medio de la instruccion insert
		//$myvar = "index";
		//$stmt = Conexion::conectar()->prepare("ALTER TABLE  $tabla ORDER BY $myvar;");
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo,descripcion,nombrecategoria,salida) VALUES(:codigo,:descripcion,:nombrecategoria,:salida)");

		//AQUI BASICAMENTE LO QUE VAMOS A HACER ES EXTRAER CADA UNO DE LOS DATOS DEL ARRAY EN EL ORDEN EN EL QUE FUERON INSERTADOS EN EL ARRAY:
		$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_INT);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":nombrecategoria",$datos["nombrecategoria"],PDO::PARAM_INT);
		$stmt->bindParam(":salida",$datos["salida"],PDO::PARAM_INT);
		
		


		if ($stmt->execute()) { //aqui en if decimos que si la variable stmt se ejecuta,que me returne un ok
			
			return "ok"; //este ok se returna hacia la funcion ctrCrearUsuarios,se encarga de indicar si todo salio bien o si hubo un error,si todo salio bien,manda este ok y si sale mal,manda el "error"

		} else{ //DE LO CONTRARIO,si no se ejecuta,entonces que returne un error
			//showMessage();
			

			return "error";


		}


		
		$stmt->close();//con este comando indicamos a la aplicacion web que se debe cerrar la conexion con la base de datos por motivos de seguridad.
		
		
		$stmt->null; //aqui lo que hacemos es dejar vacia la variabke stmt haciendola igual a null,por motivos de seguridad
		
	

}














}


?>

