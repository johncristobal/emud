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
							<li><a href="{{URL::asset('/')}}Nota/notas" class="button special">Regresar</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
				<h3>NOTA DE EVOLUCION</h3></legend>
		
			<form method="" action="">
				<table align="center" border="0" class="default">
				
				<tr>
					<td><label>Nombre del Paciente</label></td>
                                        <td><input type="text" class="form" name="nombre" value="{{ $nombre }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>	
					<td><label>Edad</label></td>
                                        <td><input type="text" class="form" name="edad" value="{{ $edad }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>G&eacute;nero</label></td>
                                        <td><input type="text" class="form" name="genero" value="{{ $genero }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>Numero del Expediente</label></td>
					<td><input type="text" class="form" value="{{ $num }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>Fecha</label></td>
                                        <td><input type="date" class="form" name="fecha" value="{{ $fecha }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>Referencia</label></td>
                                        <td><input type="text" class="form" name="ref" value="{{ $referencia }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Contrareferencia</label></td>
                                        <td><input type="text" class="form" name="contra" value="{{ $contraref }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Nota de Evolucion</label></td>
                                        <td><textarea class="form" rows="3" name="nota" cols="40">{{ $nota }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<!--tr>
					<td colspan="2"><input type="submit" value="Guardar Nota"></td>
				</tr-->
                                <tr>
                                    <td colspan="2"><a href="{{URL::asset('/')}}Nota/notas" class="button special">Regresar</a></td>
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

