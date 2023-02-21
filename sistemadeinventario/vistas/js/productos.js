$(".tablas").on("click",".btnEditarProductos",function(){ //debemos ponerle siempre un . antes del nombre de la variable,
	//si es el nombre de una clase,como en este caso,tablas es una clase que viene del archivo usuarios.php,
	//btnEditarUsuario tambien es una clase,que viene de usuarios,asi que tambien llevara su punto.

	var idProductos =$(this).attr("idProductos"); //decimos que la variable idUsuarios es igual a idUsuario,este idUsuario
	//proviene del archivo usuarios.php,traemos la informacion que contiene,ya que este idUsuario contiene la variable 
	//valores,la cual contiene la informacion que esta registrada en la tabla,en este caso,traemos de esta 
	//variable el valor "id",es decir,el id con el que se identifica cada registro en la base de datos,ya que lo
	//vamos a necesitar para hacer las funciones de editar y eliminar,puesto que el id es un valor unico,que tomamos
	//como referencia para cada registro y nos servira para distinguir cada registro de la base de datos.

	var datos=new FormData();//creamos la variable datos,la cual va a contener los datos que le vamos a pasar a
	//el ajax

	datos.append("idProductos",idProductos); //aqui lo que hacemos es pasarle a la variabla datos,la variable
	//idUsuario y su contenido.

	$.ajax({

		url:"ajax/productos.ajax.php", //ponemos la url,del archivo al que vamos a mandar estos datos,no mandamos la contraseña porque no la vamos a mostrar
		method:"POST",//el metodo por el cual vamos a enviar los datos es por post,para que sea seguro
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			var datosCategoria = new FormData();

        //el idCategoria pertenece a categorias y el idcategoria en minusculas pertenece a productos
			datosCategoria.append("idCategoria",respuesta["idcategoria"]);


		$.ajax({
		url:"ajax/categorias.ajax.php", //ponemos la url,del archivo al que vamos a mandar estos datos,no mandamos la contraseña porque no la vamos a mostrar
		method:"POST",//el metodo por el cual vamos a enviar los datos es por post,para que sea seguro
		data:datosCategoria,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			//el de la izquierda es el nombre que tiene en el formulario y el de la derecha es el que tiene en la base de datos
			$("#editarCategoria").val(respuesta["id"]);
			$("#editarCategoria").html(respuesta["nombre"]);





		}


		})

			//a la izquierda van los nombres o names o ids del formulario,a la derecha los nombres de cada parametro en la base de datos

			$("#idproductos").val(respuesta["id"]);
			$("#editarCodigo").val(respuesta["codigo"]);
			$("#editarDescripcion").val(respuesta["descripcion"]);
			$("#editarStock").val(respuesta["stock"]);
			$("#editarPrecio").val(respuesta["precio"]);


			

		}

		})



	



			swal({
			  title: "Recordatorio",
			  text: "!!Recuerde que el mismo codigo no puede registrarse mas de una vez,hacerlo podria ocasionar un error!!",
			  icon: "warning"
			});
			


})


$(".tablas").on("click",".btnEliminarProductos",function(){ //debemos ponerle siempre un . antes del nombre de la variable,
	//si es el nombre de una clase,como en este caso,tablas es una clase que viene del archivo usuarios.php,
	//btnEditarUsuario tambien es una clase,que viene de usuarios,asi que tambien llevara su punto.

	var idProductos=$(this).attr("idProductos"); //decimos que la variable idUsuarios es igual a idUsuario,este idUsuario
	//proviene del archivo usuarios.php,traemos la informacion que contiene,ya que este idUsuario contiene la variable 
	//valores,la cual contiene la informacion que esta registrada en la tabla,en este caso,traemos de esta 
	//variable el valor "id",es decir,el id con el que se identifica cada registro en la base de datos,ya que lo
	//vamos a necesitar para hacer las funciones de editar y eliminar,puesto que el id es un valor unico,que tomamos
	//como referencia para cada registro y nos servira para distinguir cada registro de la base de datos.

		swal({
			  title: "¿Esta seguro de borrar el producto?",
			  text: "¡Si no lo esta,puede cancelar la accion!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true
			})
			.then(function(result) {
			  if (result) {
			    window.location = "index.php?ruta=productos&idProductos=" + idProductos;


			  } 
			});

	




})