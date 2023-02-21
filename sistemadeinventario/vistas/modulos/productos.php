<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>Productos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="Productos">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          




          <div class="box">
            <div class="box-header">
              <button class= "btn btn-primary" data-toggle="modal" data-target="#modalAgregarProductos">
                Agregar productos
              </button> 


              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Categoria</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Precio</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>



                <?php

                $item = null; //DECLARAMOS estas variables y hacemos que sean null,es decir,que esten vacias.
                $valor = null;

                $productos = ControladorProductos::ctrMostrarProductos($item,$valor); //decimos que la variable usuarios es igual a la clase ControladorUsuarios,la cual contiene la funcion o el metodo ctrMostrarUsuarios,metodo que se encarga de mostrar la informacion de los usuarios,hacemos el llamado a esa funcion y le mandamos dos variables que creamos vacias,ya que son igual a null.

                foreach($productos as $key => $valores){

                  $item = "id";
                  $valor = $valores["idcategoria"];

                  $cate = ControladorCategorias::ctrMostrarCategorias($item,$valor); //aqui lo que hacemos es que llamamos a la clase ControladorCategorias,en la cual se encuentra la funcion ctrMostrarCategorias,a la cual llamamos y enviamos 2 parametros que son item,el cual contiene el string "id" y valor,el cual contiene el array "idcategoria",lo que hara todo esto sera que al finalizar la consulta nos traera el resultado,es decir,nos traera en este caso,el parametro que este registrado en la base de datos,en la tabla categorias,cuyo id corresponda con el id que hemos ingresado en idcategoria
                    
                    //AQUUI HAREMOS LA MAQUETACION
                    echo " 
                      <tr>

                      <td>".($key+1)."</td>
                      <td>".$cate["nombre"]."</td>
                      <td>".$valores["codigo"]."</td>
                      <td>".$valores["descripcion"]."</td>
                      <td>".$valores["stock"]."</td>
                      <td> $ ".$valores["precio"]."</td>
                      

                      <td>
                      <button class='btn btn-primary btnEditarProductos' idProductos = ".$valores["id"]." data-toggle='modal' data-target='#modalEditarProductos'>Editar</button>

                      <button class='btn btn-danger btnEliminarProductos'idProductos = ".$valores["id"]." >Eliminar</button>

                      <button class='btn btn-primary btnEntrada' idProductos = ".$valores["id"]." data-toggle='modal' data-target='#modalEntrada'><i class='fa fa-plus'></i></button>


                      <button class='btn btn-primary btnSalida' idProductos = ".$valores["id"]." data-toggle='modal' data-target='#modalSalida'><i class='fa fa-minus'></i></button>


                      </td>

                      


                      </tr>
                     ";




                }



                ?>


                </tbody>

                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


  <div  id = "modalAgregarProductos" class = "modal fade" role = "dialog">
    
    <div class = "modal-dialog">
      
      <div class = "modal-content">
        
        <form rool = "form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss = "modal">&times;</button>

            <h4 class="modal-title">Agregar Producto</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <select class="form-control input-lg" name="categoria">
                    
                      <option value="">Seleccionar Categoria</option>

                      <?php

                        $item = null;
                        $valor = null;

                        $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor); //esto lo que hace es hacer la consulta por medio de un seleccionar para seleccionar la categoria que queremos asignarle a el producto que estamos registrando


                        foreach ($categorias as $key => $datos) {
                                  
                                  echo "<option value=".$datos["id"].">".$datos["nombre"]."</option>";

                        }


                       ?>


                  </select>

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-users"></i></span>

                  <input type="text" class = "form-control input-lg " name="codigo" placeholder="Ingresar codigo">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-users"></i></span>

                  <input type="text" class = "form-control input-lg " name="descripcion" placeholder="Descripcion del producto">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class = "form-control input-lg " name="stock" placeholder="Ingresar stock">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="number" class = "form-control input-lg " name="precio" placeholder="Ingresar precio">

                </div>

              </div>




            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss = "modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Guardar Producto</button>

          </div>


        </form>

        <?php

        $crearProductos = new ControladorProductos(); //llamamos a la clase ControladorProductos,la cual contiene a la funcion ctrCrearProductos,la cual vamos a llamar desde aca.
        
        $crearProductos->ctrCrearProductos(); //llamamos a la funcion ctrCrearProductos,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarProductos que esta en la clase ModeloProductos,la cual se encargara de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>

<!--MODAL EDITAR USUARIOS -->

    <div  id = "modalEditarProductos" class ="modal fade" role ="dialog">
    
    <div class ="modal-dialog">
      
      <div class ="modal-content">
        
        <form rool ="form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Productos</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">


              <!--CAMPO OCULTO -->

               <div class="form-group">
                
                <div class="input-group">

                  <input type="hidden" class = "form-control input-lg " name="idproductos" id="idproductos">

                </div>

              </div>



                <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <select class="form-control input-lg" name="editarCategoria">
                    
                      <option id="editarCategoria"></option>

                  </select>

                </div>

              </div>
              
              

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <input type="text" class="form-control input-lg " name="editarCodigo" id="editarCodigo">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class ="form-control input-lg " name="editarDescripcion" id="editarDescripcion">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="number" class="form-control input-lg"name="editarStock"id="editarStock">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="number" class="form-control input-lg"name="editarPrecio"id="editarPrecio">

                </div>

              </div>







            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Editar Producto</button>

          </div>


        </form>

        <?php

        

        $editarProductos=new ControladorProductos(); //llamamos a la clase ControladorUsuarios,la cual contiene a la funcion ctrCrearUsuarios,la cual vamos a llamar desde aca.
        
        $editarProductos->ctrEditarProductos(); //llamamos a la funcion ctrEditarUsuarios,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarUsuarios que esta en la clase ModeloUsuarios,la cual se encargara de hacer la conexion y de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>


  <?php
    $borrarProductos=new ControladorProductos(); //llamamos a la clase ControladorUsuarios,la cual contienea la funcion ctrBorrar Usuarios,a la cual vamos a llamar para que se ejecute.
    $borrarProductos->ctrBorrarProductos(); //llamamos a esta clase,la cual a su vez llama a la funcion mdlBorrarUsuarios


    ?>



      <div  id = "modalEntrada" class = "modal fade" role = "dialog">
    
    <div class = "modal-dialog">
      
      <div class = "modal-content">
        
        <form rool = "form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss = "modal">&times;</button>

            <h4 class="modal-title">Entrada stock</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">
              

              <div class="form-group">
      
                  <input type="hidden" class = "form-control input-lg " name="entradaId" id="entradaId">

                

              </div>




              <div class="form-group">
      
                  <input type="hidden" class = "form-control input-lg " name="entradaCodigo" id="entradaCodigo">

                

              </div>

              <div class="form-group">
      
                  <input type="hidden" class = "form-control input-lg " name="entradaDescripcion" id="entradaDescripcion">

                

              </div>


              <div class="form-group">
    
                  <input type="hidden" class = "form-control input-lg " name="entradaCategoria" id="entradaCategoria">

                

              </div>




             

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class = "form-control input-lg " name="entrada" placeholder="Ingresar entrada stock">

                </div>

              </div>

              
            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss = "modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Guardar Stock</button>

          </div>


        </form>

        <?php

        $crearEntrada = new ControladorProductos(); //llamamos a la clase ControladorProductos,la cual contiene a la funcion ctrCrearProductos,la cual vamos a llamar desde aca.
        
        $crearEntrada->ctrCrearEntrada(); //llamamos a la funcion ctrCrearProductos,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarProductos que esta en la clase ModeloProductos,la cual se encargara de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>


  <div  id = "modalSalida" class = "modal fade" role = "dialog">
    
    <div class = "modal-dialog">
      
      <div class = "modal-content">
        
        <form rool = "form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss = "modal">&times;</button>

            <h4 class="modal-title">Salida stock</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">
              

              <div class="form-group">
      
                  <input type="hidden" class = "form-control input-lg " name="salidaId" id="salidaId">

                

              </div>




              <div class="form-group">
      
                  <input type="hidden" class = "form-control input-lg " name="salidaCodigo" id="salidaCodigo">

                

              </div>

              <div class="form-group">
      
                  <input type="hidden" class = "form-control input-lg " name="salidaDescripcion" id="salidaDescripcion">

                

              </div>


              <div class="form-group">
    
                  <input type="hidden" class = "form-control input-lg " name="salidaCategoria" id="salidaCategoria">

                

              </div>




             

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class = "form-control input-lg " name="salida" placeholder="Ingresar salida stock">

                </div>

              </div>

              
            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss = "modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Guardar Salida</button>

          </div>


        </form>

        <?php

        $crearSalida = new ControladorProductos(); //llamamos a la clase ControladorProductos,la cual contiene a la funcion ctrCrearProductos,la cual vamos a llamar desde aca.
        
        $crearSalida->ctrCrearSalida(); //llamamos a la funcion ctrCrearProductos,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarProductos que esta en la clase ModeloProductos,la cual se encargara de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>


  




  

