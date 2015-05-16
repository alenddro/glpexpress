<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link href="css/sticky-footer.css" rel="stylesheet">
	</head>
	<body>

		<header>
		 	<div class="navbar navbar-inverse navbar-fixed-top" id="nav-lipigas" role="navigation">
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
		            <li class
		            ="active"><a href="#principal">Home</a></li>
		            <li><a href="#acerca_de">Acerca de</a></li>
		            <li><a href="#solicitePedido">Solicite Pedido</a></li>
		          </ul>
		        </div><!--/.nav-collapse -->
		      </div>
		    </div>
		</header>

		<div class="jumbotron" id="entorno_cliente">
			<section id="principal" class="container-fluid">
		    	<div class="row">
		    		<div class="col-md-12">
					    <div class="container">
						    <div class="row">
						    	<div class="col-xs-12">
								    <div class="starter-template">
								        <h1>Entorno Cliente</h1>
								        <p class="lead">Bienvenido, si quieres solicitar tu gas inicia sesion o registrate!</p>
								     </div>
								</div><!-- /.container -->


								<section class="container-fluid">
									<div class="row">
										<div class="col-xs-12 col-md-5 ">
											<article class="container ">
											    <form class="form-signin fomrulario-lipigas" role="form" method="post" action="login.php">
											        <h2 class="form-signin-heading">Iniciar Sesion</h2>
											        <input type="text" class="form-control" placeholder="Usuario" name="txtlogin" required="" autofocus="">
											        <input type="password" class="form-control" placeholder="Password" name="txtpassword" required="">
											        <label class="checkbox">
											            <input type="checkbox" value="remember-me">Recordarme
											        </label>
											        <button class="btn btn-lg btn-warning btn-block" type="submit">Ingresar</button>
	                                                <small><a href="registro.html">Registrese</a></small>
											    </form>

										    </article>
										</div>
									</div>
								</section>
						   	</div>
						</div>
					</div>
			    </div>
			</section>
		</div>

		<section class="container-fluid visible-xs" id="acerca_de">
			<div class="row">
				<div class="col-xs-12">
					<div class="container">
						<div class="row">
							<article class="col-xs-6 ">
								<h2>Acerca De Nosotros</h2>
								<p class="text-center">
	                                    <a href="#acercaDe" data-toggle="collapse">Ver Mas</a>
	                            </p>
								<p id="acercaDe"  class="collapse">
									Lipigas es la empresa l&iacute;der de gas licuado en Chile, alcanzando un 38% en participaci&oacute;n de mercado  con la mayor cobertura a nivel nacional; presente en los sectores residenciales, industriales e inmobiliarios; con certificaciones ambientales y de seguridad; que cuenta con plantas de envasado que est&aacute;n entre las m&aacute;s moderna de Am&eacute;rica Latina y es la &uacute;nica del rubro que contar&aacute; con un terminal mar&iacute;timo de uso exclusivo; una compa&ntilde;&iacute;a que ha dado pasos de internacionalizaci&oacute;n (actualmente esta presente en Colombia y Per&uacute;) , y cuenta con premios que reconocen su calidad, su reputaci&oacute;n corporativa y su ambiente laboral (Carlos Vial Espantoso, Procalidad, Great Place to Work, etc).
								</p>
							</article>
							<article class="col-xs-6" >
								<img src="img/left.jpg" class="img-responsive" width="400" height="300">
							</article>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="container-fluid hidden-xs" id="acerca_de">
			<div class="row">
				<div class="col-xs-12">
					<div class="container">
						<div class="row">
							<article class="col-xs-6 ">
								<h2>Acerca De Nosotros</h2>
								<p id="acercaDe"  class="">
									Lipigas es la empresa l&iacute;der de gas licuado en Chile, alcanzando un 38% en participaci&oacute;n de mercado  con la mayor cobertura a nivel nacional; presente en los sectores residenciales, industriales e inmobiliarios; con certificaciones ambientales y de seguridad; que cuenta con plantas de envasado que est&aacute;n entre las m&aacute;s moderna de Am&eacute;rica Latina y es la &uacute;nica del rubro que contar&aacute; con un terminal mar&iacute;timo de uso exclusivo; una compa&ntilde;&iacute;a que ha dado pasos de internacionalizaci&oacute;n (actualmente esta presente en Colombia y Per&uacute;) , y cuenta con premios que reconocen su calidad, su reputaci&oacute;n corporativa y su ambiente laboral (Carlos Vial Espantoso, Procalidad, Great Place to Work, etc).
								</p>
							</article>
							<article class="col-xs-6" >
								<img src="img/left.jpg" class="img-responsive" width="400" height="300">
							</article>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="container-fluid jumbotron" id="solicitePedido">
			<div class="row">
				<div class="col-xs-12">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h2>Solicite Su Pedido</h2>
								<p>
									<img src="img/flujo.jpg" alt="Solicite" class="img-responsive">
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



		<footer class="container-fluid footer">
			<div class="row">
				<div class="col-xs-12">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
	        					<h1>&copy; GlpExpress 2015</h1>
								<p>Nosotros | Privacidad | Terminos y condiciones</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </footer>

    	<!-- Modal automatico sin boton-->
	    <?php 
	    	require_once("conexion.php");
	    	$sqlOfertas="select * from oferta order by id_of desc limit 1";
	    	$ejecOfertas=mysql_query($sqlOfertas,$conexion);
	    	$arrayOfertas=mysql_fetch_array($ejecOfertas);

	    	$sqlPromocion="select * from promocion order by id_prom desc limit 1";
	    	$ejecPromocion=mysql_query($sqlPromocion,$conexion);
	    	$arrayPromocion=mysql_fetch_array($ejecPromocion);

	    	if (isset($arrayOfertas['id_of']) or isset($arrayPromocion['id_prom'])) {; ?>
	    	
			<section class="modal fade" id="modal-content">
			  <div class="modal-dialog">
			    <div class="modal-content">
			  	<?php if (isset($arrayOfertas['id_of'])) {; ?>
				      <div class="modal-header">
				        <h4 class="modal-title">Oferta!</h4>
				        <h3 class="modal-title" title="<?php echo $arrayOfertas['titulo_of']?>"><?php echo $arrayOfertas['titulo_of']?></h3>
				      </div>
				      <div class="modal-body">
				        <h1>$<?php echo $arrayOfertas['valor_of']?></h1>
				        <p><?php echo $arrayOfertas['descrip_of']?></p>
				        <p><img src="<?php echo $arrayOfertas['imagen_of']?>" width="200" alt="oferta"></p>
				      </div>
			  	<?php }; ?>
			  	<?php if (isset($arrayPromocion['id_prom'])) {; ?>
				      <div class="modal-header">
				        <h4 class="modal-title">Promoci&oacute;n!</h4>
				        <h3 class="modal-title" title="<?php echo $arrayPromocion['titulo_prom']?>"><?php echo $arrayPromocion['titulo_prom']?></h3>
				      </div>
				      <div class="modal-body">
				        <h1>+<?php echo $arrayPromocion['valor_prom']?></h1>
				        <p><?php echo $arrayPromocion['descrip_prom']?></p>
				        <p><img src="<?php echo $arrayPromocion['imagen_prom']?>" width="200" alt="oferta"></p>
				      </div>
			  	<?php }; ?>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</section><!-- /.modal -->

	    <?php } ;?>
	    <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function () {
			    $('#modal-content').modal('show');
			    $('#modal-content').on('shown')
			    $('ul.nav > li').click(function (e) {
			        $('ul.nav > li').removeClass('active');
			        $(this).addClass('active');
			    });
		    });
		</script>
	</body>


</html>