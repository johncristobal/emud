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
					<h3>Alta de perfil</h3>

                                        @if(count($errors))
                                            <h5 style="color: #FAF834;">Favor de llenar los campos marcados con *</h5>
                                        @endif

			<form method="post" action="{{URL::asset('/')}}Usuarios/Alta">
			<table border="0"  class="form">
				<tr>
                                    <td>* Nombre</td><td><input type="text" name="nombre"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>

                                <tr>
                                    
                                    <td>* Apellido paterno</td><td><input type="text" name="paterno"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>
                                <tr>
                                    <td>* Apellido materno</td><td><input type="text" name="materno"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>

                                <tr>
                                    <td>* Correo</td><td><input type="text" name="correo"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>
                                <tr>
                                    <td>Matricula</td><td><input type="text" name="matricula"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>

                                <tr>
                                    <td>* Contraseña</td><td><input type="password" name="pass"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>
                                <tr>
                                    <td>* Confirmar contraseña</td><td><input type="password" name="very"></td>					
				</tr>
				<tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>

                                <tr>
                                    <td>* Perfil</td>                                
                                    <td>
                                        <select name="perfil">                                        
                                            <option value="1">Administrador</option> 
                                            <option value="2">Alumno</option> 
                                        </select>
                                    </td>					
				</tr>
                                <tr>
                                    <td class="Separador" colspan="6"></td>
				</tr>
				<tr>
                                    <td>* Clinica</td>
                                    <td>
                                        <select name="clinica_selected">                                        
                                            @foreach ($clinicas as $value)                                                                                                                     
                                                <option value="{{ $value->nombre_clinica }}"> {{ $value->nombre_clinica }}</option> 
                                            @endforeach
                                        </select>
                                    </td>					
                                </tr>

				<tr>
                                    <td class="Separador" colspan="2"></td>
				</tr>

				<tr>
                                    <td colspan="2" align="center"><input type="submit" value="Crear"></td>
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