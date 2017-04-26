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
					<h2>Aparatos y Sistemas</h2>	
			
			<form method="post" action="{{url::asset('/')}}Expediente/Alta/Aparatos">
				<table align="center" border="0">

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
					
				<tr>
					<td><label>Digestivo</label></td>
                                        <td><textarea rows="3" cols="40"class="form" name="diges">{{ $digestivo }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Respiratorio</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="resp">{{ $respiratorio }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Cardiovascular</label></td>
					<td><textarea rows="3" cols="40" class="form" name="cardio">{{ $cardiovascular }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Esqueletico</label></td>
					<td><textarea rows="3" cols="40" class="form" name="esqle">{{ $esqueletico }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Urinario</label></td>
					<td><textarea rows="3" cols="40" class="form" name="uri">{{ $urinario }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Linfohematico</label></td>
					<td><textarea rows="3" cols="40" class="form" name="linfo">{{ $linfo }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Endocrino</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="endo">{{ $endocrino }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Nervioso</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="nervi">{{ $nervioso }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Tegumentario</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="tegu">{{ $tegumentario }}</textarea></td>
				</tr>


				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
                                    <td><label>Observaciones</label></td>
                                    <td><textarea rows="3" cols="40" class="form" name="observaciones">{{ $observaciones }}</textarea></td>
				</tr>
				<tr>
					<td colspan="2"></br></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Guardar Datos"></td>
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

