<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('../conexion.php');


    function tipousuario($tipo){

        if ($tipo==0) {
            $tipo="Usuario";
        }elseif($tipo==1){
            $tipo="Trabajador";
        }elseif($tipo==3){
            $tipo="Secretaria";
        }elseif($tipo==4){
            $tipo="Usuario Dado de Baja";
        }elseif($tipo==5){
            $tipo="Trabajador Dado de Baja";
        }

        return $tipo;
    }

    function estadousuario($estado){
        if ($estado==0 or $estado==1 or $estado==3) {
            $estado="btn-success";
            $estadousu="fa-check";
        }elseif($estado==4 or $estado==5){
            $estado="btn-danger";
            $estadousu="fa-times";
        }

        return array($estado, $estadousu);
    }

    /* querys */
      $url = basename($_SERVER ["PHP_SELF"]);
      if (isset($_GET['pos'])){
        $ini=$_GET['pos'];
      }else{ 
        $ini=1;
      }
      $limit_end = 15;
      $init = ($ini-1) * $limit_end;

      $count="select count(*) from usuario where esadmin<>'2' ";
      $num= mysql_query($count,$conexion);
      $x = mysql_fetch_array($num);
      $total = ceil($x[0]/$limit_end);

    //Cantidad TOTAL de usuarios
    $sqlListarUsuariosSistema = "select * from usuario where esadmin<>'2' order by esadmin desc  LIMIT $init, $limit_end";
    $ejecListarUsuariosSistema=mysql_query($sqlListarUsuariosSistema,$conexion);

    //cantidad de USUARIOS TOTAL 
    $sqlListarUsuariosTOTALSistema = "select * from usuario where esadmin<>'1' and esadmin<>'2' and esadmin<>'3'";
    $ejecListarUsuariosTOTALSistema=mysql_query($sqlListarUsuariosTOTALSistema,$conexion);
    $cantidadListarUsuariosTOTALSistema=mysql_num_rows($ejecListarUsuariosTOTALSistema);

    //cantidad de USUARIOS ELIMINADOS TOTAL 
    $sqlListarUsuariosELIMINADOSTOTALSistema = "select * from usuario where esadmin='4'";
    $ejecListarUsuariosELIMINADOSTOTALSistema=mysql_query($sqlListarUsuariosELIMINADOSTOTALSistema,$conexion);
    $cantidadListarUsuariosELIMINADOSTOTALSistema=mysql_num_rows($ejecListarUsuariosELIMINADOSTOTALSistema);

    //cantidad de TRABAJADORES TOTAL 
    $sqlListarTrabajadoresTOTALSistema = "select * from usuario where esadmin<>'0' and esadmin<>'2'";
    $ejecListarTrabajadoresTOTALSistema=mysql_query($sqlListarTrabajadoresTOTALSistema,$conexion);
    $cantidadListarTrabajadoresTOTALSistema=mysql_num_rows($ejecListarTrabajadoresTOTALSistema);

    //cantidad de TRABAJADORES ELIMINADOS TOTAL 
    $sqlListarTrabajadoresELIMINADOSTOTALSistema = "select * from usuario where esadmin='5'";
    $ejecListarTrabajadoresELIMINADOSTOTALSistema=mysql_query($sqlListarTrabajadoresELIMINADOSTOTALSistema,$conexion);
    $cantidadListarTrabajadoresELIMINADOSTOTALSistema=mysql_num_rows($ejecListarTrabajadoresELIMINADOSTOTALSistema);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrar Usuarios Y Trabajadores</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script src="assets/ajax/modalmensaje.js"></script>
    <script src="../isset/functions.php"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <?php 
        require_once("assets/content/header-content.php");
      ?>
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <?php 
        require_once("assets/content/navbar-left-content.php");
      ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Administrar Usuarios Y Trabajadores</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="row mt">
                      <div class="col-md-12">
                          <div class="content-panel">
                              <table class="table table-striped table-advance table-hover ">
                                  <h5>Cantidad de Usuarios en el sistema: <?php echo $cantidadListarUsuariosTOTALSistema?></h5>
                                  <h5>Cantidad de Usuarios Eliminados: <?php echo $cantidadListarUsuariosELIMINADOSTOTALSistema?></h5>
                                  <h5>Cantidad de Trabajadores: <?php echo $cantidadListarTrabajadoresTOTALSistema?></h5>
                                  <h5>Cantidad de Trabajadores Eliminados: <?php echo $cantidadListarTrabajadoresELIMINADOSTOTALSistema?></h5>
                                  <hr>
                                  <thead>
                                  <tr>
                                      <th><i class="fa fa-bullhorn"></i> Nombre</th>
                                      <th><i class="fa fa-question-circle"></i> Tipo Usuario</th>
                                      <th><i class="fa"><b>@</b></i> Correo</th>
                                      <th class="hidden-phone"><i class="fa fa-bookmark"></i> Registrado el</th>
                                      <th class="hidden-phone"><i class=" fa fa-edit"></i> Estado</th>
                                      <th><i class=" fa fa-edit"></i> Acciones</th>
                                      <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php while ($arrayListarUsuariosSistema=mysql_fetch_array($ejecListarUsuariosSistema)){; ?>
                                  <tr>
                                      <td><a href="javascript:;"><?php echo $arrayListarUsuariosSistema['nombre_usu'] ." ". $arrayListarUsuariosSistema['apellido_usu']; ?></a></td>
                                      <td><?php echo tipousuario($arrayListarUsuariosSistema['esadmin']); ?></td>
                                      <td><?php echo $arrayListarUsuariosSistema['email_usu']; ?></td>
                                      <td class="hidden-phone"><?php echo $arrayListarUsuariosSistema['registrado_el']; ?></td>
                                      <td class="hidden-phone"><button class="btn <?php list($estado, $estadousu)=estadousuario($arrayListarUsuariosSistema['esadmin']); echo $estado; ?> btn-xs"><i class="fa <?php list($estado, $estadousu)=estadousuario($arrayListarUsuariosSistema['esadmin']); echo $estadousu; ?>"></i></button></td>
                                      <td>
                                          <!--<button class="btn btn-success btn-xs"><i class="fa fa-check"><a href="javascript:;"></a></i></button>-->
                                          <a href="#" data-toggle="modal" data-target="#myModal<?php echo $arrayListarUsuariosSistema['id_usu']; ?>" onClick="mensajeUsu(<?php echo $arrayListarUsuariosSistema['id_usu'];?>, '<?php echo $arrayListarUsuariosSistema['nombre_usu'];?>', '<?php echo $arrayListarUsuariosSistema['apellido_usu'];?>', '<?php echo $arrayListarUsuariosSistema['email_usu'];?>');"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                          <a href="javascript:;"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                      </td>
                                  </tr>
                                  <?php }; ?>
                                  </tbody>
                              </table>

                              <div class="text-center">
                                <ul class='pagination pagination-lg '>
                                  <?php
                                  /****************************************/
                                  if(($ini - 1) == 0){
                                  ?>  
                                    <li><a href='#'>&laquo;</a></li>
                                  <?php
                                  }else{
                                  ?>
                                    <li><a href="<?php echo $url ;?>?pos=<?php echo ($ini-1) ;?> " ><b>&laquo;</b></a></li>
                                  <?php
                                  }
                                  /****************************************/
                                  for($k=1; $k <= $total; $k++){
                                    if($ini == $k){
                                  ?>
                                      <li><a href='#'><b><?php echo $k ;?></b></a></li>
                                  <?php
                                  }else{
                                  ?>  
                                  <?php
                                    }
                                  }
                                  ?>
                                  <li><a href="javascript:void(0);"> DE </a></li>
                                  <li><a href="<?php echo $url ;?>?pos=<?php echo $k-1 ;?>"><?php echo $k-1 ;?></a></li>

                                  <?php
                                  /****************************************/
                                  if($ini == $total){
                                  ?>
                                    <li><a href='#'>&raquo;</a></li>
                                  <?php
                                  }else{
                                  ?>
                                    <li><a href="<?php echo $url;?>?pos=<?php echo ($ini+1) ;?>"><b>&raquo;</b></a></li>
                                  <?php
                                  }
                                  ?>
                                </ul>
                              </div>

                              <div id="containermodal"></div>
                              <div id="respuestaMensajeModal"></div>

                          </div><!-- /content-panel -->
                      </div><!-- /col-md-12 -->
                  </div><!-- /row -->
                </div>
            </div>

        </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php 
        require_once("assets/content/footer-content.php");
      ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
   
  </script>

  </body>
</html>
