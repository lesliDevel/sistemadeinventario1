<?php

require_once '../controladores/productos.controlador.php';
//require_once '../controladores/usuarios.controlador.editar.php';
//require_once '../controladoreditar/usuarios.editar.php';
//require_once '../controladores/usuarios.controlador.mostrar.php';
require_once '../modelos/productos.modelo.php';

class AjaxProductos{

	public $idProductos; //lo hacemos public,porque aqui vamos a recibir la variable idUsuario desde el archivo usuarios.js

	public function AjaxEditarProductos(){



		$item="id"; //la variable item es igual id,que sera el valor que tomaremos de referencia,al ser unico,como un punto de referencia para ubicar los registros.
		$valor= $this->idProductos; //NOTA:es importante que cuando usemos el ->,la palabra,variable o lo que sea que siga,este pegado a este ->,es decir,no deben haber espacios ni antes del ->,ni despues de el.


		$respuesta = ControladorProductos::ctrMostrarProductos($item,$valor); //llamamos a la clase ControladorUsuarios,en la cual se encuentre la funcion que vamos a llamar,la cual es ctrMostrarUsuarios,la que a su vez va a llamar tambien a la funcion mdlMostrarUsuarios,la cual se encargara de establecer la conexion con la base de datos.Le pasamos a la funcion,2 parametros,los cuales son,item y valor,el item el cual contiene el id,dato unico que usaremos de referencia,la variable valor que contiene el idUsuario,el cual contiene el id que se extrae.


		echo json_encode($respuesta); //luego esto se lo pasamos en formato json.


	}






}

//este if esta fuera de la clase,debo meterlo a la clase
if(isset($_POST["idProductos"])) { //DECIMOS QUE si el post,envia idUsuarios,entonces que ejecute el siguiente codigo:


	$editar= new AjaxProductos(); //instanciamos la clase AjaxUsuarios,que es esta clase,la cual contiene la funcion que vamos a llamar.
	$editar->idProductos= $_POST['idProductos'];//aqui decimos que idUsuario se vaya a el objeto instanciado,que es la funcion AjaxUsuarios
	$editar->AjaxEditarProductos(); //luego decimos que la variable editar que contiene el id usuario,llame a la funcion AjaxEditarUsuarios,haciendo que se ejecute dicha funcion.

	//El operador -> , se utiliza en el ámbito del objeto para acceder a métodos y propiedades de un objeto. Su significado es decir que lo que está a la derecha del operador es un miembro del objeto instanciado en la variable del lado izquierdo del operador.
}



