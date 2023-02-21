


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          




          <div class="box">
            <div class="box-header">
              <button class= "btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                Agregar usuarios
              </button> 


              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Perfil</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>



                <?php

                $item = null; //DECLARAMOS estas variables y hacemos que sean null,es decir,que esten vacias.
                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor); //decimos que la variable usuarios es igual a la clase ControladorUsuarios,la cual contiene la funcion o el metodo ctrMostrarUsuarios,metodo que se encarga de mostrar la informacion de los usuarios,hacemos el llamado a esa funcion y le mandamos dos variables que creamos vacias,ya que son igual a null.

                foreach ($usuarios as $key => $valores) {
                    
                    //AQUUI HAREMOS LA MAQUETACION
                    echo " 
                      <tr>

                      <td>".($key+1)."</td>
                      <td>".$valores["nombre"]."</td>
                      <td>".$valores["usuario"]."</td>
                      <td>".$valores["perfil"]."</td>
                      <td>".$valores["fecha"]."</td>

                      <td>
                      <button class='btn btn-primary btnEditarUsuario' idUsuario = ".$valores["id"]." data-toggle='modal' data-target='#modalEditarUsuarios'>Editar</button>

                      <button class='btn btn-danger btnEliminarUsuario'idUsuario = ".$valores["id"]." >Eliminar</button>


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


  <div  id = "modalAgregarUsuarios" class = "modal fade" role = "dialog">
    
    <div class = "modal-dialog">
      
      <div class = "modal-content">
        
        <form rool = "form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss = "modal">&times;</button>

            <h4 class="modal-title">Agregar Usuarios</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class = "form-control input-lg " name="nombre" placeholder="Ingresar Nombre">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-users"></i></span>

                  <input type="text" class = "form-control input-lg " name="usuario" placeholder="Ingresar Usuario">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="password" class = "form-control input-lg " name="password" placeholder="Ingresar Contraseña">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class = "form-control input-lg " name="perfil" placeholder="Ingresar Perfil">

                </div>

              </div>




            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss = "modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Guardar Usuario</button>

          </div>


        </form>

        <?php

        $crearUsuarios = new ControladorUsuarios(); //llamamos a la clase ControladorUsuarios,la cual contiene a la funcion ctrCrearUsuarios,la cual vamos a llamar desde aca.
        
        $crearUsuarios->ctrCrearUsuarios(); //llamamos a la funcion ctrCrearUsuarios,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarUsuarios que esta en la clase ModeloUsuarios,la cual se encargara de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>

<!--MODAL EDITAR USUARIOS -->

    <div  id = "modalEditarUsuarios" class ="modal fade" role ="dialog">
    
    <div class ="modal-dialog">
      
      <div class ="modal-content">
        
        <form rool ="form" method="post">
          
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Usuarios</h4>

          </div>

          <!--MAQUETACION: -->

          <div class="modal-body">
            
            <div class="box-body">


              <!--CAMPO OCULTO -->

               <div class="form-group">
                
                <div class="input-group">

                  <input type="hidden" class = "form-control input-lg " name="id" id="id">

                </div>

              </div>




              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class = "form-control input-lg " name="editarNombre" id="editarNombre">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <input type="text" class="form-control input-lg " name="editarUsuario" id="editarUsuario">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class = "input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="password" class ="form-control input-lg " name="editarPassword">

                </div>

              </div>

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class="form-control input-lg"name="editarPerfil"id="editarPerfil">

                </div>

              </div>




            </div>


          </div>


          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            
            <button type="submit" class="btn btn-primary">Editar Usuario</button>

          </div>


        </form>

        <?php

        

        $editarlosUsuarios=new ControladorUsuarios(); //llamamos a la clase ControladorUsuarios,la cual contiene a la funcion ctrCrearUsuarios,la cual vamos a llamar desde aca.
        
        $editarlosUsuarios->ctrEditarUsuarios(); //llamamos a la funcion ctrEditarUsuarios,la cual se encargara de hacer todo el proceso,luego llamara la funcion mdlGuardarUsuarios que esta en la clase ModeloUsuarios,la cual se encargara de hacer la conexion y de guardar la informacion en la base de datos.
      

        ?>


      </div>


    </div>



  </div>


  <?php
    $borrarlosUsuarios=new ControladorUsuarios(); //llamamos a la clase ControladorUsuarios,la cual contienea la funcion ctrBorrar Usuarios,a la cual vamos a llamar para que se ejecute.
    $borrarlosUsuarios->ctrBorrarUsuarios(); //llamamos a esta clase,la cual a su vez llama a la funcion mdlBorrarUsuarios


    ?>


  

