<?php

	class Conexion{ //creamos la clase Conexion

		static public function conectar(){ //creamos la funcion o el metodo conectar,el cual se encargara de hacer la conexion con la base de datos

			$link = new PDO('mysql:host=localhost;dbname=sistemadeinventario','root','');//en esta variable le pasamos la informacion con la que se establecera la conexion con el local,le pasamos el nombre de la base de datos,el nombre de usuario que en este caso por defecto es root y la contraseña,que en este caso,esta vacia porque no tengo,todos esos datos son necesarios para establecer la conexion con la db.

			$link -> exec("set names utf8"); //ponemos esto para la codificacion de caracteres especiales,para que sea en español y acepte las letras del alfabeto español,recuerda que el set se encarga es de modificar,es decir,que esto lo que va a hacer es modificar las palabras para que esten en formato español y no queden letras como la ñ por fuera.

			return $link; //retornamos la variable link,de esta manera,la conexion con la base de datos ya estara establecida.









		}





	}
























?>





