<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" /> 
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
							<li><a href="{{URL::asset('/')}}index.php/Alumno" class="button special">Menú</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
					<h2>FICHA DE IDENTIFICACION</h2>
				
					<form method="" action="">
						<table border="0" align="center" class="default">
						<tr>
							<td>Nombre de la instituci&oacute;n:</td> <td><input type="text" name="Institucion"></td>
							<td>Numero de Expediente: </td> <td><input type="text" name="NumExpediente"></td>
							<td>Fecha de inicio: </td> <td><input type="date" name="FechaInicio"></td>			
						</tr>

						<tr>
							<td class="Separador" colspan="6"></td>
						</tr>

												
						<tr>
							<td class="Separador" colspan="6"></td>
						</tr>
									
						<tr>
							<td>CURP:</td>	<td><input type="text" name="curp"></td>	
							<td>Fotografia: </td> <td><input type="file" name="fotografia"></td>	
						</tr>

						<tr>
							<td class="Separador" colspan="6"></td>
						</tr>

												
						<tr>
							<td><label>Numero de Recibo de Expediente: </label></td>
							<td><input type="text" name="NumReciboExpediente"></td>	
						</tr>


						<tr>
							<td class="Separador" colspan="6"></td>
						</tr>						

						<tr>
								<td colspan="6"><h3>Datos del Paciente<h3></td>
						</tr>
						<tr>
								<td>Apellido Paterno: </td> <td><input type="text" name="APat"></td>	
								<td>Apellido Materno: </td> <td><input type="text" name="AMat"></td>
								<td>Nombre(s): </td>  <td><input type="text" name="Nombre"></td>	
						</tr>

						<tr>
								<td class="Separador" colspan="6"></td>
						</tr>

							<tr>
								<td>Genero:</td> <td><select name="GeneroPaciente">
																		<option value="Masculino">Masculino</option>
																		<option value="Femenino">Femenino</option>
																	</select></td>	
								<td>Ocupacion: </td> <td><input type="text" name="Ocupacion"></td>
								<td>Escolaridad: </td> <td><select name="escolaridad">
																<option value="Primaria">Primaria</option>
																<option value="Secundaria">Secundaria</option>
																<option value="Preparatoria">Preparatoria</option>
																<option value="Universidad">Universidad</option>
															</select></td>		
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>
							
							

							<tr>
								<td>Estado Civil:</td><td><select name="edoCivil">
																<option value="Soltero">Soltero</option>
																<option value="Casado">Casado</option>
																<option value="Viudo">Viudo</option>
																<option value="Divorciado">Divorciado</option>
																<option value="Union Libre">Union Libre</option>
															</select></td>	
								<td>Religi&oacute;n:</td> <td><select name="Religion">
																	<option value="Catolica">Catolica</option>
																	<option value="Cristiana">Cristiana</option>
																	<option value="Mormona">Mormona</option>
																	<option value="Budista">Budista</option>
																</select></td>	
								<td>Edad: </td><td> <input type="text" name="Edad"></td>					
							</tr>
						
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>	

							<tr>
								<td>Fecha de Nacimiento:</td><td><input type="date" name="FechaNac"></td>	
								<td>Lugar de Nacimiento: </td> <td><select name="lugarNac">
																		<option value="Aguascalientes">Aguascalientes</option>
																		<option value="D.F.">Distrito Federal</option>
																		<option value="Mexico">Estado de Mexico</option>
																		<option value="Tlaxcala">Tlaxcala</option>
																	</select></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>						
						
							<tr>
								<td colspan="6"><h3>Direcci&oacute;n</h3></td>

							</tr>
								
							<tr>
								<td>Calle: </td><td><input type="text" name="CalleNum"></td>
								<td>N&uacute;mero: </td><td><input type="text" name="CodPostal"></td>	
								<td><label>C&oacute;digo Postal: </td> <td><input type="text" name="CodPostal"></td>
							</tr>
							

							<tr>
								<td class="Separador" colspan="6"></td>	
							</tr>

							
							<tr>
								<td> Colonia </td> <td><input type="text" name="Colonia" required></td>	
								<td>Delegaci&oacute;n o Municipio: </td><td><input type="text" name="Municipio"></td>	
								<td>Entidad:</td> <td><select name="estado">
															<option value="Aguascalientes">Aguascalientes</option>
															<option value="D.F.">Distrito Federal</option>
															<option value="Mexico">Estado de Mexico</option>
															<option value="Tlaxcala">Tlaxcala</option>
														</select></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>	
							</tr>

							<tr>
								<td>Teléfono: </td>	<td><input type="text" name="Telefono"></td>	
								<td>Institución de DerechoHabiencia:</td> <td><select name="institucion">
																				<option>Selecciona</option>
																				<option value="Ninguno">Ninguno</option>
																				<option value="IMSS">IMSS</option>
																				<option value="ISSEMYM">ISSEMYM</option>
																				<option value="ISSFAM">ISSFAM</option>
																				<option value="ISSTE">ISSTE</option>
																				<option value="PEMEX">PEMEX</option>
																				<option value="SEGURO POPULAR">SEGURO POPULAR</option>
																				<option value="SSA">SSA</option>
																				<option value="OTROS">OTROS</option>
																			</select></td>
							</tr>
							

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>
												
							<tr>
								<td colspan="6"><h4>En el interrogatorio indirecto nombre y parentezco de la persona que proporciona información</h4></td>
							</tr>	

							<tr>
								<td>Apellido Paterno: </td> <td><input type="text" name="APat"></td>
								<td>Apellido Materno: </td> <td><input type="text" name="AMat"></td>		
								<td>Nombre(s): </td>  <td><input type="text" name="Nombre"></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td colspan ="2">En caso necesario comunicarse al Tel:</td><td><input type="text" name="TelAux"></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td colspan="6"><h3>Datos Sobre Consulta </h3></td>									
							</tr>

							<tr>
								<td >Motivo de Consulta:</td>
								<td colspan="2"><textarea class="tam" name="MotivoCons" rows="6" cols="2" ></textarea>									
							</tr>
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td >Nota de ingreso del paciente:</td>
								<td colspan="2"><textarea class="tam" name="MotivoCons" rows="6" cols="2" ></textarea>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td ><label>Alerta sobre alguna alergia:</label></td>
								<td colspan="2"><textarea class="tam" name="MotivoCons" rows="6" cols="2" ></textarea>		
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<!--PReguntar aqui que informacion se necesita para capturar-->

							<tr>
								<td >Somatria y Signos Vitales: </td> <td><input type="text" name="signosvilates"></td>			     <td >Estatura: </td> <td><input type="text" name="Estatura">Mts</td>	
								<td >Peso:</td> <td><input type="text" name="Peso">Kg</td>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td>Pulso:</td><td><input type="text" name="Pulso">FC</td>						
								<td>Frecuencia Respiratoria: </td> <td><input type="text" name="FrecResp">RPM</td>	
								<td>Tensi&oacute;n Arterial: </td> <td><input type="text" name="FrecResp">mm HG</td>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td>Temperatura Axilar:</td><td><input type="text" name="Temperatura">°C</td>					
								<td>Grupo Sanguineo:</td><td><input type="text" name="FrecResp"></td>								
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>

								<td colspan="6"><input type="submit" value="Guardar Datos" align="center"></td>									
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>