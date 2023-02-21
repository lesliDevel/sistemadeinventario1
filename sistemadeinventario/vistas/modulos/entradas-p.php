<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>Entradas de productos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">entradas de productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          




          <div class="box">
            <div class="box-header">


              


              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped tablas">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Categoria</th>
                  <th>Entrada</th>
                </tr>
                </thead>
                <tbody>



                <?php

                $item = null; //DECLARAMOS estas variables y hacemos que sean null,es decir,que esten vacias.
                $valor = null;

                $entrada = ControladorEntradas::ctrMostrarEntradas($item,$valor); //decimos que la variable usuarios es igual a la clase ControladorUsuarios,la cual contiene la funcion o el metodo ctrMostrarUsuarios,metodo que se encarga de mostrar la informacion de los usuarios,hacemos el llamado a esa funcion y le mandamos dos variables que creamos vacias,ya que son igual a null.

                foreach ($entrada as $key => $valores) {

                  $item = "id";
                  $valor = $valores["nombrecategoria"];

                  $cate = ControladorCategorias::ctrMostrarCategorias($item,$valor); //esto nos permite traer el nombre de la categoria a la que corresponda el id en cada stock
                    
                    //AQUUI HAREMOS LA MAQUETACION
                    echo " 
                      <tr>

                      <td>".($key+1)."</td>
                      <td>".$valores["codigo"]."</td>
                      <td>".$valores["descripcion"]."</td>
                      <td>".$cate["nombre"]."</td> 
                      <td>".$valores["entrada"]."</td>

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


  


    


  

