<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
                <link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
                        <?php
                            echo $head;
                        ?>

			<!-- Banner -->
				<section id="banner">
					<section id="principal">
					<h3>Asignar expediente a alumno</h3>
				

			
	<form method="post" action="{{url::asset('/')}}Expediente/Reasignar">
		<table  border ="0" class="form">
			<tr>
                            <td>Seleccionar alumno</td>
                            <td>
                                <select name="estudiante">
                                    @foreach($alumnos as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </td>		
			</tr>

			<tr>
                            <td class="Separador" colspan="6"></td>
			</tr>

			<tr>
                            <td>Seleccionar expediente</td>
                            <td>
                                <select name="exped">
                                    @foreach($expedientes as $value)
                                    <option value="{{$value->id}}">{{$value->folio_expediente}}</option>
                                    @endforeach
                                </select>
                            </td>		
			</tr>

			<tr>
                            <td class="Separador" colspan="2"></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" value="asignar"></td>
			</tr>
		</table>
	</form>
		</section>
				</section>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-bar-chart-o"></span>
						<h2><strong>EEMUD</strong>  Es un sistema diseñado para 
						<br />
						para la gestión de un consultorio</h2>
						
					</header>

					<!-- One -->
						
					<!-- Two -->
						

					<!-- Three -->
						

				</article>

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