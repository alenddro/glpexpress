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
            $tipo="Desactivado";
        }elseif($tipo==5){
            $tipo="Desactivado";
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

    $sqlListarUsuariosSistema = "select * from usuario where esadmin<>'2' order by esadmin desc";
    $ejecListarUsuariosSistema=mysql_query($sqlListarUsuariosSistema,$conexion);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Administrar Usuarios Y Trabajadores</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

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
                                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"><a href="javascript:;"></a></i></button>
                                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "><a href="javascript:;"></a></i></button>
                                      </td>
                                  </tr>
                                  <?php }; ?>
                                  </tbody>
                              </table>
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
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
