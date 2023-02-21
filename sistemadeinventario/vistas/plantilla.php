<?php
  
  //llamamos a la funcion session start para que se ejecute
  session_start();

  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventario | LesliDevel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!--TOAST NOTIFICACTION -->
  <!-- -->
  <!--<link rel="stylesheet" href="toastr.min.css"> -->
  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
  <!-- LIBERIAS JAVASCRIPT,ASI SOLUCIONAMOS EL PROBLEMA DE QUE LOS SWEETALERT,debemos llamar siempre primero a las liberias,antes de llamar a las funciones para evitar este error-->


  <!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- sweetaler -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

<!-- Morris.js charts -->
<script src="vistas/bower_components/raphael/raphael.min.js"></script>
<script src="vistas/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/bower_components/moment/min/moment.min.js"></script>
<script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>

  

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">



<!-- -->
<!--EXPLICACION:Explicacion del siguiente codigo: Basicamente funciona asi,la condicion del primer if es que si
ese primer if recibe una ruta,entonces debe ejecutar el siguiente if,la condicion de ese if es que si "ruta"
es igual a usuarios,entonces que ejecuta el siguiente codigo,que es un include el cual lo que hara sera
concatenar la ruta modulos con la ruta recibida,que es la de usuarios,por lo tanto se concatenaria asi
"modulos/usuarios.php" -->



   <?php

//AQUI VALIDAMOS SI EL USUARIO HA INICIADO SESION,SI NO LO HA HECHO,NO PODRA VER LA INFORMACION ALMACENADA EN EL INVENTARIO Y SERA DIRECTAMENTE APUNTADO A INICIAR SESION.

//que es lo que hace isset?

   //Determina si una variable está definida y no es NULL . Si una variable ha sido removida con unset(), esta ya no estará definida. isset() devolverá FALSE si prueba una variable que ha sido definida como NULL .

    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {  //aqui lo hace es comprobar primero que iniciarSesion no este vacio,es decir,que no sea null,luego comprueba si iniciarSesion es igual a "ok",decimos que si ambas condiciones se cumplan,que corra el siguiente codigo:

      
      echo '<div class="wrapper">';
    


      include 'modulos/header.php'; 

      include 'modulos/menu.php';






    if (isset($_GET["ruta"])) {
      //aqui incluimos todas las rutas

      if ($_GET["ruta"] == "usuarios" || 
          $_GET["ruta"] == "categorias" ||
          $_GET["ruta"] == "productos" ||
          $_GET["ruta"] == "salidas-p" ||
          $_GET["ruta"] == "entradas-p"  ||
          $_GET["ruta"] == "login" ||
          $_GET["ruta"] == "salir"


    ) {


        include "modulos/".$_GET["ruta"].".php"; 

      }
     

//basicamente este else significa que si la ruta obtenida NO ES LA de usuarios,entonces que si nos muestre las cajas,
      //es decir que cuando estemos en la ruta usuarios,LAS CAJAS NO SE VAN A MOSTRAR.
    } else{

      include 'modulos/inicio/cajas.php'; 

    }



      include 'modulos/footer.php';


      echo '</div>';


    } else{ //DE LO CONTARIO,ES DECIR,si las condiciones no se cumplen,se ejecutara esto:

             include 'modulos/login.php';

             //es decir,si el usuario no tiene la seccion iniciada,no se le mostrara la informacion,si no que sera dirigido directamente a iniciar sesion




    }


     ?>


 

  





<!-- Aqui lo que hacemos es llamar a la plantilla js que esta almacenada en la carpeta js,la cual esta en la carpeta vistas--->
<script src="vistas/js/plantilla.js"></script> 

<script src="vistas/js/usuarios.js"></script>

<script src="vistas/js/categorias.js"></script>

<script src="vistas/js/productos.js"></script>

<script src="vistas/js/stock.js"></script>




<!--TOAST NOTIFICACTION -->

 <!--<script src="jquery-3.3.1.min.js"></script>
 -->

  <!--<script src="toastr.min.js"></script> -->







<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>





<!--<script src="./controladores/mialerta.js"></script> -->








</body>
</html>
