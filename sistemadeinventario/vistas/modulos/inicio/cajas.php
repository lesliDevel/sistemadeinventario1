<?php
  
$item = null;
$valor = null;

//CATEGORIAS

$categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor); 


foreach ($categorias as $key => $value) {
  
  $datos[] = $value["id"]; //creamos el array datos
}


$totalcategorias = count($datos); //esto cuanta el total de filas de la tabla categorias o el total de categorias y lo almacena en esta variable

//USUARIOS

$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor); 


foreach ($usuarios as $key => $valueU) {
  
  $datosU[] = $valueU["id"]; //creamos el array datos
}


$totalusuarios = count($datosU); //esto cuanta el total de filas de la tabla usuarios o el total de usuarios y lo almacena en esta variable

//PRODUCTOS

$productos = ControladorProductos::ctrMostrarProductos($item,$valor); 


foreach ($productos as $key => $valueP) {
  
  $datosP[] = $valueP["id"]; //creamos el array datos
}


$totalproductos = count($datosP); //esto cuanta el total de filas de la tabla productos o el total de productos y lo almacena en esta variable

//ENTRADAS
$entradas = ControladorEntradas::ctrMostrarEntradas($item,$valor); 


foreach ($entradas as $key => $valueE) {
  
  $datosE[] = $valueE["id"]; //creamos el array datos
}


$totalentradas = count($datosE); //esto cuanta el total de filas de la tabla productos o el total de productos y lo almacena en esta variable


//SALIDAS
$salidas = ControladorEntradas::ctrMostrarSalidas($item,$valor); 


foreach ($salidas as $key => $valueS) {
  
  $datosS[] = $valueS["id"]; //creamos el array datos
}


$totalsalidas = count($datosS); //esto cuanta el total de filas de la tabla productos o el total de productos y lo almacena en esta variable


?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totalcategorias;  ?></h3> <!--aqui ponemos la variable total categorias,la cual contiene el total de las categorias registradas en la tabla categorias -->

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="categorias" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalusuarios;  ?></h3>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="usuarios" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $totalproductos ;  ?></h3>

              <p>Productos registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="productos" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!--ENTRADA CAJA -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $totalentradas ;  ?></h3>

              <p>Entradas stock</p>
            </div>
            <div class="icon">
              <i class="ion-archive"></i>
            </div>
            <a href="entradas-p" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!--SALIDA CAJA -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalsalidas ;  ?></h3>

              <p>Salidas stock</p>
            </div>
            <div class="icon">
              <i class="ion-android-exit"></i>
            </div>
            <a href="salidas-p" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>




        <!-- ./col -->
      </div>
      <!-- /.row -->
  

    </section>
    <!-- /.content -->
  </div>