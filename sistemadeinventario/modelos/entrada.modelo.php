<?php

require_once 'conexion.php'; //hacemos un require en el cual decimos que requerimos a el archivo conexion.php,ya que este archivo es el que contiene la clase conexion,la cual contiene la funcion o el metodo conectar,el cual se encarga de establecer la conexion con la base de datos.

class ModeloEntradas{

	//esta funcion va a recibir a las variables tabla y datos,la variable tabla contiene el nombre de la tabla en la que se van a guardar estos datos,osea,la tabla de la base de datos y la variable datos contiene un array el cual contiene todos los datos que se enviaron en el formulario de registro de usuarios.
	



	//mostrar entradas

//aqui llegan desde usuarios.controlador,la llamada y los parametros,los cuales se van a almacenar en los parametros de aqui,en tabla se va a almacenar el nombre de la tabla,en item la variable item,la cual es null,en valor,la variable valor,la cual es null.
	static public function mdlMostrarEntradas($tabla,$item,$valor){ //declaramos esta funcion y declaramos dentro de las 
		//parentesis las variables tabla,valor e item,que seran las que van a recibir y almacenar los parametros que se
		//le envien a la funcion cuando se haga el correspondiente llamado a la funcion.
			 
			//validamos si la variable item viene vacia o no,si es diferente a null,osea que no viene nacia,le decimos que ejecute el siguiente codigo:
			if ($item != null) { //aqui en esta condicional decimos que si la variable item es diferente a null,es decir,que si la variable item NO ESTA VACIA,entonces que ejecute el siguente codigo:
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");  //aqui decimos que la variable stmt,es igual o que contiene a la clase Conexion y a la funcion conectar,la cual se encuentra en la clase Conexion.Tambien en un prepare mandamos una instruccion a la base de datos,la mandamos como string obviamente,en esta instruccion indicamos que debe SELECCIONAR un elemento de la tabla correspondiente,que en este caso es la tabla usuarios SOLO SI ESTE elemento es igual a el elemento que esta almacenado en nuestra $item,basicamente cuando se llame a la funcion a la variable item,llegara un valor,el cual se almacena en esa variable,luego se ejecuta este codigo,el cual ira a la base datos a ejecutar la instruccion,por eso previamente llamamos a la funcion que hace la conexion con la base de datos,porque para poder hacer cualquier tipo de cambio o consulta en la base de datos,es necesario que la conexion este establecida.Notemos como en la sintaxis de php no es necesario concatenar las variables.

				$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR); //aqui la variable va a tener este bindParam,el cual va a tener el item que yo estoy enviando,tambien va a contener el valor que le estamos enviando,tambien va a contener una sentencia preparada,la cual es PDO,PDO::PARAM_STR  Representa el tipo de dato CHAR, VARCHAR de SQL, u otro tipo de datos de cadena.Una sentencia preparada (Prepared Statements) o sentencias parametrizadas es una plantilla de un query o consulta que deseamos ejecutar repetidamente una gran cantidad de veces de forma eficiente. Por lo regular ejecutamos una sentencia preparada dentro de un ciclo y es aquí donde solo variar los parámetros trae excelentes beneficios,basicamente las sentencias preparadas nos facilitan la manipulacion del sql,es decir,consultas etc,esta es una gran herramienta que contiene php.

				$stmt->execute(); //llamamos a la funcion stmt para que se ejecute,llame a las funciones que establecen la conexion y haga la consulta

			
					
						




				return $stmt->fetch();//retornamos la variable stmt,la cual va a contener el resultado de la consulta.
					

				//como ya sabemos que la variable item normalmente va a estar vacia,porque asi la mandamos,pues se ejecutara este else,que lo que hara sera mostrar toda la informacion de esa tabla en nuestra app,en plantilla,bueno,sola informacion que queramos mostrar.
			} else{ //aqui en la condicional else decimos que DE LO CONTRARIO,es decir,si la variable item es igual a null,es decir que esta vacia,que ejecute el siguiente codigo:
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");  //en este caso,como se supone que esta vacio (la variable item),le decimos que nos debe traer toda la informacion de la tabla.


				

				$stmt->execute(); //llamamos a la funcion stmt para que se ejecute,llame a las funciones que establecen la conexion y haga la consulta

			


				return $stmt->fetchAll(); //le agregamos un All al fecth para que nos traiga toda la informacion de la tabla
					



			}

		
				




	}


//mostrar salidas

	static public function mdlMostrarSalidas($tabla,$item,$valor){ //declaramos esta funcion y declaramos dentro de las 
		//parentesis las variables tabla,valor e item,que seran las que van a recibir y almacenar los parametros que se
		//le envien a la funcion cuando se haga el correspondiente llamado a la funcion.
			 
			//validamos si la variable item viene vacia o no,si es diferente a null,osea que no viene nacia,le decimos que ejecute el siguiente codigo:
			if ($item != null) { //aqui en esta condicional decimos que si la variable item es diferente a null,es decir,que si la variable item NO ESTA VACIA,entonces que ejecute el siguente codigo:
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");  //aqui decimos que la variable stmt,es igual o que contiene a la clase Conexion y a la funcion conectar,la cual se encuentra en la clase Conexion.Tambien en un prepare mandamos una instruccion a la base de datos,la mandamos como string obviamente,en esta instruccion indicamos que debe SELECCIONAR un elemento de la tabla correspondiente,que en este caso es la tabla usuarios SOLO SI ESTE elemento es igual a el elemento que esta almacenado en nuestra $item,basicamente cuando se llame a la funcion a la variable item,llegara un valor,el cual se almacena en esa variable,luego se ejecuta este codigo,el cual ira a la base datos a ejecutar la instruccion,por eso previamente llamamos a la funcion que hace la conexion con la base de datos,porque para poder hacer cualquier tipo de cambio o consulta en la base de datos,es necesario que la conexion este establecida.Notemos como en la sintaxis de php no es necesario concatenar las variables.

				$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR); //aqui la variable va a tener este bindParam,el cual va a tener el item que yo estoy enviando,tambien va a contener el valor que le estamos enviando,tambien va a contener una sentencia preparada,la cual es PDO,PDO::PARAM_STR  Representa el tipo de dato CHAR, VARCHAR de SQL, u otro tipo de datos de cadena.Una sentencia preparada (Prepared Statements) o sentencias parametrizadas es una plantilla de un query o consulta que deseamos ejecutar repetidamente una gran cantidad de veces de forma eficiente. Por lo regular ejecutamos una sentencia preparada dentro de un ciclo y es aquí donde solo variar los parámetros trae excelentes beneficios,basicamente las sentencias preparadas nos facilitan la manipulacion del sql,es decir,consultas etc,esta es una gran herramienta que contiene php.

				$stmt->execute(); //llamamos a la funcion stmt para que se ejecute,llame a las funciones que establecen la conexion y haga la consulta

			
					
						




				return $stmt->fetch();//retornamos la variable stmt,la cual va a contener el resultado de la consulta.
					

				//como ya sabemos que la variable item normalmente va a estar vacia,porque asi la mandamos,pues se ejecutara este else,que lo que hara sera mostrar toda la informacion de esa tabla en nuestra app,en plantilla,bueno,sola informacion que queramos mostrar.
			} else{ //aqui en la condicional else decimos que DE LO CONTRARIO,es decir,si la variable item es igual a null,es decir que esta vacia,que ejecute el siguiente codigo:
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");  //en este caso,como se supone que esta vacio (la variable item),le decimos que nos debe traer toda la informacion de la tabla.


				

				$stmt->execute(); //llamamos a la funcion stmt para que se ejecute,llame a las funciones que establecen la conexion y haga la consulta

			


				return $stmt->fetchAll(); //le agregamos un All al fecth para que nos traiga toda la informacion de la tabla
					



			}

		
				




	}






}


?>

