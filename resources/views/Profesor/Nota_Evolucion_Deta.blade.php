<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
                <script type="text/javascript">
                    function validar(){
                        var a = confirm('¿Desea validar la '+arguments[0]+'?');
                        var saved = arguments[0];
                        var observa = document.getElementById("observaprofe").value;
                        if(a){
                            //get id expediente y set status from direccion in 5
                            $.ajax({
                                type:'POST',
                                url:'{{url::asset('/')}}Profesor/Notas/validar',
                                data:{'tipo':arguments[1],'obs':observa},
                                success:function(data){
                                    alert(saved+' validada');
                                    window.location.href = '{{url::asset('/')}}Profesor/Nota/notas';
                               }
                            },10000);
                        }
                    }
                    </script>
	</head>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					
					<nav id="nav">
						<ul>
							<li class="submenu">
							<!--li><a class="button">Validar nota</a></li-->
							<li><a href="{{url::asset('/')}}Profesor/Nota/notas" class="button special">Regresar</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
				<h3>NOTA DE EVOLUCION</h3></legend>
		
			<form method="post" action="{{url::asset('/')}}Profesor/Nota/salvarobservaciones">
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
				<tr>
                                    <td><label>Observaciones profesor: &nbsp;</label></td>
                                    <td><textarea class="form" rows="3" name="observaprofe" cols="40">{{ $observacionesprofe }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

                                <tr <?php if(($observacionesprofe == NULL) || ($observacionesprofe == '')){echo "style='display: none;'";}else{echo "style='display: table-row;'";}?>>
                                    <td>Observaciones <br/>profesor:</td>
                                    <td colspan ="2"><textarea class="tam" name="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)" disabled="true">{{ $observacionesprofe }}</textarea></td>
                                </tr>
                                <tr>
                                        <td class="Separador" colspan="6"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" value="Guardar observaciones">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value="Validar nota" align="center" onclick="window.location.href = '{{url::asset('/')}}Profesor/Nota/validarnota';">
                                    </td>
				</tr>
                                <!--tr>
                                    <td colspan="2"><a href="{{url::asset('/')}}Nota/notas" class="button special">Regresar</a></td>
                                </tr-->
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

