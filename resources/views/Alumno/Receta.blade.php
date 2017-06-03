<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
	</head>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					
					<nav id="nav">
						<ul>
							<li class="submenu">
							<li><a href="{{url::asset('/')}}Alumno" class="button special">Menú</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
					<h3>Receta</h3>

					@if(count($errors))
                        <h5 style="color: #FAF834;">Favor de llenar los campos marcados con *</h5>
                    @endif

			<form method="post" action="{{url::asset('/')}}pdf">
				<table border="0" align="center" class="default">
				<tr>
					<td><label>*Identificador:</label></td>
					<td><input type="text" name="id"></td>
				</tr>
				<tr>
					<td></br></td>	
				</tr>
				
				<tr>
					<td><label>*Area de Atenci&oacute;n:</label></td>
					<td><input type="text" name="areaatencion"></td>
				</tr>
				<tr>
					<td></br></td>	
				</tr>
				<tr>
					<td><label>*Preescripción:</label></td>
					<td><textarea class="form" rows="3" cols="30" name="preescripcion"></textarea></td>
				</tr>

				<tr>
					<td><label>*Indicaciones:</label></td>
					<td><textarea class="form"rows="3" cols="30" name="indicaciones"></textarea></td>
				</tr>
				
				<tr>
					<td><label>*Observaciones:</label></td>
					<td><textarea class="form" rows="3" cols="30" name="observaciones"></textarea></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" value="Generar receta"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td colspan="2">Nota: Registre nombre generico y comercial de medicamentos, consulte instrucciones</td>
				</tr>
					
			</table>
			</form>
			

			
					
			</fieldset>
			
				<!--Se ternina de editar aqui-->
			</div> 
		</section> 

			<!-- Main -->

			<!-- CTA -->
				

			<!-- Footer -->
				<footer id="footer">

					<ul class="icons">
						<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy; Copyright 2015</li><li><strong>CAROLVE SYSTEMS S.A de C.V</strong></li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
            <?php
                echo $scrip;
            ?>

	</body>
</html>





