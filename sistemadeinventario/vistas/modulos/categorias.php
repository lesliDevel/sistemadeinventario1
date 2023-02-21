<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>categorias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          




          <div class="box">
            <div class="box-header">
              <button class= "btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategorias">
                Agregar categorias
              </button> 


              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>



                <?php

                $item = null; //DECLARAMOS estas variables y hacemos que sean null,es decir,que esten vacias.
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor); //decimos que la variable usuarios es igual a la clase ControladorUsuarios,la cual contiene la funcion o el metodo ctrMostrarUsuarios,metodo que se encarga de mostrar la informacion de los usuarios,hacemos el llamado a esa funcion y le mandamos dos variables que creamos vacias,ya que son igual a null.

                foreach ($categorias as $key => $valores) {
                    
                    //AQUUI HAREMOS LA MAQUETACION
                    echo " 
                      <tr>

                      <td>".($key+1)."</td>
                      <td>".$valores["nombre"]."</td>
                      <td>".$valores["fecha"]."</td>

                      <td>
                      <button class='btn btn-primary btnEditarCategoria' idCategoria = ".$valores["id"]." data-toggle='modal' data-target='#modalEditarCategorias'>Editar</button>

                      <button class='btn btn-danger btnEliminarCategoria'idCategoria = ".$valores["id"]." >Eliminar</button>


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


  <div  id = "modalAgregarCategorias" class = "modal fade" role = "dialog">
    
    <div class = "modal-dialog">
      
      <div class = "modal-content">
        
        <form rool = "form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss = "modal">&times;</button>

            <h4 class="modal-title">Agregar Categorias</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class = "form-control input-lg " name="nombrecategoria" placeholder="Ingresar categoria">

                </div>

              </div>

              




            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss = "modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Guardar categoria</button>

          </div>


        </form>

        <?php

        $crearCategorias = new ControladorCategorias(); //llamamos a la clase ControladorUsuarios,la cual contiene a la funcion ctrCrearUsuarios,la cual vamos a llamar desde aca.
        
        $crearCategorias->ctrCrearCategorias(); //llamamos a la funcion ctrCrearUsuarios,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarUsuarios que esta en la clase ModeloUsuarios,la cual se encargara de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>

<!--MODAL EDITAR USUARIOS -->

    <div  id = "modalEditarCategorias" class ="modal fade" role ="dialog">
    
    <div class ="modal-dialog">
      
      <div class ="modal-content">
        
        <form rool ="form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Categorias</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">


              <!--CAMPO OCULTO -->

               <div class="form-group">
                
                <div class="input-group">

                  <input type="hidden" class = "form-control input-lg " name="idcategoria" id="idcategoria">

                </div>

              </div>




              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class = "form-control input-lg " name="editarCategoria" id="editarCategoria">

                </div>

              </div>

              




            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Editar categorias</button>

          </div>


        </form>

        <?php

        

        $editarlosUsuarios=new ControladorCategorias(); //llamamos a la clase ControladorUsuarios,la cual contiene a la funcion ctrCrearUsuarios,la cual vamos a llamar desde aca.
        
        $editarlosUsuarios->ctrEditarCategorias(); //llamamos a la funcion ctrEditarUsuarios,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarUsuarios que esta en la clase ModeloUsuarios,la cual se encargara de hacer la conexion y de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>


  <?php
    $borrarlosUsuarios=new ControladorCategorias(); //llamamos a la clase ControladorUsuarios,la cual contienea la funcion ctrBorrar Usuarios,a la cual vamos a llamar para que se ejecute.
    $borrarlosUsuarios->crtBorrarCategorias(); //llamamos a esta clase,la cual a su vez llama a la funcion mdlBorrarUsuarios


    ?>


  

