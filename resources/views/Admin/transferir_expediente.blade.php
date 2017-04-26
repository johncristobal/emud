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
                <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/main.css" /> 
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
					<h3>Tranferir expediente</h3>
				

		<form method="" action="">
		<table class="form" border="0">
			<tr><td colspan="3">Seleccionar alumno que tiene el expediente</td></tr>
			<tr>
				<td>Seleccionar alumno:</td>
                                <td>
                                <select name="estudianteA">
                                    @foreach($alumnos as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>

                                </td>
				<td></td>										
			</tr>

			<tr>
				<td class="Separador" colspan="3"></td>
			</tr>
			
			<!--tr><td colspan="2">Seleccionar alumno a quien se tranfiere el expediente</td></tr>
			<tr>
				<td>Seleccionar alumno:</td><td><select><option>xs</option>
			</tr>
			<tr>
				<td class="Separador" colspan="3"></td>
			</tr>

			<tr><td colspan="3" align="center"><input type="submit" value="Reasignar"></td></tr-->
		</table>
                    
                <table width="100%">
                    <thead>
                    <th width="30%"><h3>Expediente</h3></th>
                    <th width="35%"><h3>Alumno actual</h3></th>
                    <th width="35%"><h3>Transferir a</h3></th>
                    <!--th width="5%"></th-->
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
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