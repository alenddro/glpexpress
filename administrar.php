<?php session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
require_once('conexion.php');   
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Administrador</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link href="css/sticky-footer.css" rel="stylesheet">
	    <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<header>
		 	<div class="navbar navbar-inverse navbar-default" id="nav-lipigas" role="navigation">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="logotipo" href="#"><img src="img/logotipo.png" class="img-responsive" alt="logotipo"></a>
		        </div>
		        <div class="collapse navbar-collapse navbar-right">
		          <ul class="nav navbar-nav">
		            <li class="active"><a href="#principal">Home</a></li>
		            <li><a href="#acerca_de">Acerca de</a></li>
		            <li><a href="#solicitePedido">Solicite Pedido</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
		      </div>
		    </div>
		</header>

		<?php require_once("isset/header-estadisticas.php");?>

		<section class="container-fluid" id="dashboard">
			<article class="row">
				<div class="col-xs-12">
					<section id="usuLogueado" class="container">
				        <div class="row">
				            <div class="col-xs-12">
				                <p><small>Bienvenido Usuario: <strong><i class="nombreusu"><?php echo $_SESSION['nombre_usu'];?></i></strong></small></p> 
				                <p><small><a style="text-decoration:none;" href="cierra_session.php">Cerrar Sesion</a></small></p>
				            </div>
				        </div>     
				    </section>

					<div class="container">
						<div class="row">
							<article class="col-sm-4 col-sm-offset-2 col-xs-12 col-dashboard">
                                <a href="#area-trabajador" data-toggle="collapse"  title="Trabajadores">
                                    <div><h3>Area Trabajador</h3></div>
                                </a>
                                <p id="area-trabajador" class="collapse">
                                   <a class="col-xs-12" href="registrartrabajador.php"><img src="img/agregarusu.png" width="30" alt="agregarusuario">Agregar Trabajador</a>
                                   <a class="col-xs-12" href="listartrabajadores.php"><img src="img/listado.png" width="30" alt="agregarusuario">Listar Trabajador</a>
                                </p>
                            </article>
                            <article class="col-sm-4 col-xs-12 col-dashboard">
                                <a href="#area-solicitudes" data-toggle="collapse" title="Solicitudes">
                                    <div ><h3>Area Solicitudes</h3></div>
                                </a>
                                <div id="area-solicitudes" class="collapse">
                                   <a class="col-xs-12" href="listado.php"><img src="img/checklist.png" width="30" alt="agregarusuario">Solicitudes Activas</a>
                                   <a class="col-xs-12" href="listadofinalizado.php"><img src="img/checklistfull.jpg" width="30" alt="agregarusuario">Solicitudes Finalizadas</a>
                                </div>
                            </article>
						</div>
                        <div class="row">
                        	<article class="col-sm-4 col-sm-offset-2 col-xs-12 col-dashboard">
                                <a href="estadisticas.php" title="Estadisticas">
                                    <div><h3>Area Estadisticas</h3></div>
                                </a>
                            </article>
                             <article class="col-sm-4 col-xs-12 col-dashboard">
                                <a href="#area-producto" data-toggle="collapse" title="Producto">
                                    <div ><h3>Area Productos</h3></div>
                                </a>
                                <div id="area-producto" class="collapse">
                                   <a class="col-xs-12" href="agregarproducto.php"><img src="img/checklist.png" width="30" alt="agregarproducto">Agregar Producto</a>
                                   <a class="col-xs-12" href="listarproducto.php"><img src="img/checklistfull.jpg" width="30" alt="listarproducto">Listar Producto</a>
                                </div>
                            </article>
                        </div>
                        <div class="row">
                        	 <article class="col-sm-4 col-sm-offset-2 col-xs-12 col-dashboard">
                                <a href="#area-oferta" data-toggle="collapse" title="Oferta">
                                    <div ><h3>Area Oferta</h3></div>
                                </a>
                                <div id="area-oferta" class="collapse">
                                   <a class="col-xs-12" href="agregaroferta.php"><img src="img/checklist.png" width="30" alt="agregaroferta">Agregar Oferta</a>
                                   <a class="col-xs-12" href="listaroferta.php"><img src="img/checklistfull.jpg" width="30" alt="listaroferta">Listar Oferta</a>
                                </div>
                            </article>
                             <article class="col-sm-4 col-xs-12 col-dashboard">
                                <a href="#area-camiones" data-toggle="collapse" title="Camiones">
                                    <div ><h3>Area Camiones</h3></div>
                                </a>
                                <div id="area-camiones" class="collapse">
                                   <a class="col-xs-12" href="agregarcamiones.php"><img src="img/checklist.png" width="30" alt="agregarcamiones">Agregar camiones</a>
                                   <a class="col-xs-12" href="listarcamiones.php"><img src="img/checklistfull.jpg" width="30" alt="listarcamiones">Listar camiones</a>
                                </div>
                            </article>
                        </div>
                        <div class="row">
                        	<!-- Aqui van mas opciones de menu-->
                        </div>
					</div>
				</div>
			</article>
		</section>

		<?php require_once("isset/footer.html");?>
	</body>
</html>