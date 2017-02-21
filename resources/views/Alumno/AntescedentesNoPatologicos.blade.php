<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{URL::asset('/')}}assets/css/main.css" /> 
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
							<li><a href="{{URL::asset('/')}}Alumno" class="button special">Menú</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
					<h2>Antescedentes Personales No Patológicos</h2>
					<h3>Inmunizaciones</h3>
				<form method="" action="">
					<table border ="0" align="center" class="default">
					<tr>
						<td><label>Tuberculosis</label></td>
						<td><select class="form">
								<option>Selecciona</option>
								<option value="Esquema Completo">Esquema completo</option>
								<option value="En Proceso">En proceso</option>
								<option value="Esquema Incompleto">Esquema incompleto</option>
								<option value="Ninguna Dosis">Ninguna dosis</option>
								<option value="Lo ignora">Lo ignora</option>
							</select></td>
					</tr>
					
					<tr>		
						<td><label>Poliomielitis (Sabin)</label></td>
						<td><select class="form">
								<option>Selecciona</option>
								<option>Esquema Completo</option>
								<option>En Proceso</option>
								<option>Esquema Incompleto</option>
								<option>Ninguna Dosis</option>
								<option>Lo Ignora</option>
							</select></td>
					</tr>
					
					<tr>
						<td><label>Pentavalente (DPT+HB+HIB)</label></td>
						<td><select class="form">
								<option>Selecciona</option>
								<option>Esquema Completo</option>
								<option>En Proceso</option>
								<option>Esquema Incompleto</option>
								<option>Ninguna Dosis</option>
								<option>Lo Ignora</option>
							</select></td>
					</tr>
					
					<tr>
						<td><label>Difteria, tosferina y t&eacute;tanos</label></td>
						<td><select class="form">
								<option>Selecciona</option>
								<option>Esquema Completo</option>
								<option>En Proceso</option>
								<option>Esquema Incompleto</option>
								<option>Ninguna Dosis</option>
								<option>Lo Ignora</option>
							</select></td>
					</tr>
					
					<tr>
						<td><label>Sarampi&oacute;n, rubeola y parotiditis</label></td>
						<td><select class="form">
								<option>Selecciona</option>
								<option>Esquema Completo</option>
								<option>En Proceso</option>
								<option>Esquema Incompleto</option>
								<option>Ninguna Dosis</option>
								<option>Lo Ignora</option>
							</select></td>
					</tr>		
						
					<tr>
						<td><label>Hepatitis B </label></td>
						<td><select class="form">
								<option>Selecciona</option>
								<option>Esquema Completo</option>
								<option>En Proceso</option>
								<option>Esquema Incompleto</option>
								<option>Ninguna Dosis</option>
								<option>Lo Ignora</option>
							</select></td>
					</tr>			

					<tr>
						<td><label>Otra</label></td>
						<td><input type="text" name="otraEnf" class="form"></td>
					</tr>
				</table>	
			
				<h3>Toxicoman&iacute;as</h3>
					<table border ="0" align="center">
						<tr>
							<td><label>Consumo de alcohol</label></td>
							<td><input type="checkbox" name="pasa" value="X"></td>					
						</tr>
						<tr>
							<td><label>Consumo de tabaco</label></td>
							<td><input type="checkbox" name="pasa" value="X"></td>					
						</tr>	
						<tr>
							<td><label>Drogas</label></td>
							<td><input type="checkbox" name="pasa" value="X"></td>					
						</tr>			
						<tr>
							<td><label>Otra(Especifique)</label></td>
							<td><input type="text" name="OtroToxicomania"class="form"></td>
						</tr>
					</table>
			</fieldset>

			<fieldset>
				<h3>H&aacute;bitos</h3>
					<table border="0" align ="center">
						<tr>
							<td><label>Deportes</label></td>
							<td><input type="checkbox" name="pasa" value="X"></td>		
						</tr>

						<tr>
							<td><label>Otro</label></td>
							<td><input type="text" name="OtroDeporte"></td>		
						</tr>

						
					</table>	
			</fieldset>

			<fieldset>
				<h3>Alimentaci&oacute;n y vivienda</h3>
				<table border="0" align="center">
					<tr>
						<td><label>Vivienda</label></td>
						<td><select class="form">
								<option value="Propia">Propia</option>
								<option value="En pago">En pago</option>
								<option value="Rentada">Rentada</option>
								<option value="Prestada">Prestada</option>
						</select></td>
					</tr>
					<tr>
						<td><label>No de habitaciones en la casa</label></td>
						<td><select class="form">
								<option value="Menos de 3">Menos de 3</option>
								<option value="Entre 4 y 6">Entre 4 y 6</option>
								<option value="Mas de 6">Mas de 6</option>
							</select></td>
					</tr>
					<tr>
						<td><label>Personas en la vivienda</label></td>
						<td><select class="form">
								<option value="De 1 a 3">De 1 a 3</option>
								<option value="De 4 a 7">De 4 a 7</option>
								<option value="Mas de 7">M&aacute;s de 7</option>
							</select></td>
					</tr>
					
					<tr>
						<td><label>Personas en la familia</label></td>
						<td><select class="form">
								<option value="De 1 a 3">De 1 a 3</option>
								<option value="De 4 a 7">De 4 a 7</option>
								<option value="Mas de 7">M&aacute;s de 7</option>
							</select></td>
					</tr>	

					<tr>
						<td><label>Personas que trabajan</label></td>
						<td><select class="form">
								<option value="Solo Padre">Solo el padre</option>
								<option value="Solo la Madre">Solo la Madre</option>
								<option value="Ambos">Ambos</option>
							</select></td>
					</tr>	

					<tr>
						<td><label>Personas menores de 15 a&ntilde;os</label></td>
						<td><select class="form">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="Mas de 3">Mas de 3</option>
							</select></td>
					</tr>
					<tr>
						<td class="Separador" colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2"><h4>Servicios con los que cuenta la vivienda<h4></td>
					</tr>

					<tr>
						<td><label>Agua potable</label></td>
						<td><input type="checkbox" value="Agua"></td>
					</tr>
					<tr>
						<td><label>Pavimentaci&oacute;n</label></td>
						<td><input type="checkbox" value="Agua"></td>
					</tr>	
					<tr>
						<td><label>Drenaje</label></td>
						<td><input type="checkbox" value="Agua"></td>
					</tr>
					<tr>
						<td><label>Luz</label></td>
						<td><input type="checkbox" value="Agua"></td>
					</tr>
					<tr>
						<td><label>Observaciones</label></td>
						<td><textarea rows="" cols="25"></textarea></td>
					</tr>
					<tr>
						<td class="Separador" colspan="2"></td>
					</tr>

					<tr>
						<td colspan="2"><input type="submit" value="Guardar datos"></td>
					</tr>
					
				</table>
				</form>
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


