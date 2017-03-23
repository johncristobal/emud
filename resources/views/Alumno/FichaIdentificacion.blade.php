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
					<h2>FICHA DE IDENTIFICACION</h2>
				
                                            <form method="post" action="{{url::asset('/')}}Expediente/Alta/Ficha">
						<table border="0" align="center" class="default">
						<tr>
                                                    <td>Nombre de la instituci&oacute;n:</td> <td><input type="text" name="Institucion" value="{{ $clinica }}" hidden="true" readonly="true"></td>
                                                    <td>Numero de Expediente: </td> <td><input type="text" name="NumExpediente" value="{{ Session::get('folioexpediente') }}" readonly="true"></td>
                                                    <td>Fecha de inicio: </td> <td><input type="date" name="FechaInicio" value="{{ $fecha1 }}"></td>			
						</tr>

						<tr>
                                                    <td class="Separador" colspan="6"></td>
						</tr>

												
						<tr>
                                                    <td class="Separador" colspan="6"></td>
						</tr>
									
						<tr>
                                                    <td>CURP:</td>	<td><input type="text" name="curp" value="{{ $expediente->curp }}"></td>	
                                                    <td>Fotografia: </td> <td><input type="file" name="fotografia"></td> <!--it coould be an image-->	
						</tr>

						<tr>
                                                    <td class="Separador" colspan="6"></td>
						</tr>

												
						<tr>
                                                    <td><label>Numero de Recibo de Expediente: </label></td>
                                                    <td><input type="text" name="NumReciboExpediente" value="{{$expediente->recibo_pago}}"></td>	
						</tr>


						<tr>
                                                    <td class="Separador" colspan="6"></td>
						</tr>						

						<tr>
                                                    <td colspan="6"><h3>Datos del Paciente<h3></td>
						</tr>
						<tr>
                                                    <td>Apellido Paterno: </td> <td><input type="text" name="APat" value="{{$expediente->ap_paterno}}"></td>	
                                                    <td>Apellido Materno: </td> <td><input type="text" name="AMat" value="{{$expediente->ap_materno}}"></td>
                                                    <td>Nombre(s): </td>  <td><input type="text" name="Nombre" value="{{$expediente->nombre_paciente}}"></td>	
						</tr>

						<tr>
                                                    <td class="Separador" colspan="6"></td>
						</tr>

							<tr>
								<td>Genero:</td> <td><select name="GeneroPaciente">
                                                                @if($expediente->genero == 'masculino')
                                                                        <option value="Masculino" selected="true">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                @else                                                                
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino" selected="true">Femenino</option>
                                                                @endif
                                                                </select></td>	
                                                                
								<td>Ocupacion: </td> <td><input type="text" name="Ocupacion" value='{{$expediente->ocupacion}}'></td>
								<td>Escolaridad: </td> 
                                                                <td>
                                                                    {!! Form::select('escolaridad',[
                                                                        'Preparatoria',
                                                                        'Universidad'
                                                                    ],$expediente->escolaridad) !!}
                                                                    <!--select name="escolaridad">
                                                                	<option value="preparatoria">Preparatoria</option>
                                                                        <option value="universidad">Universidad</option>
                                                                    </select-->
                                                                </td>		
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>
							
							

							<tr>
								<td>Estado Civil:</td>
                                                                <td>
                                                                    {!! Form::select('edoCivil',[
                                                                        'Soltero' => 'Soltero',
                                                                        'Casado' => 'Casado',
                                                                        'Viudo' => 'Viudo',
                                                                        'Divorciado' => 'Divorciado',
                                                                        'Union Libre' => 'Union Libre',
                                                                        'Otro' => 'Otro'
                                                                    ],$expediente->estadocivil) !!}
                                                                    <!--select name="edoCivil">
                                                                    <option value="Soltero">Soltero</option>
                                                                    <option value="Casado">Casado</option>
                                                                    <option value="Viudo">Viudo</option>
                                                                    <option value="Divorciado">Divorciado</option>
                                                                    <option value="Union Libre">Union Libre</option>
                                                                    </select-->
                                                                </td>	
								<td>Religi&oacute;n:</td> 
                                                                <td>
                                                                    {!! Form::select('Religion',[
                                                                        'Catolica' => 'Catolica',
                                                                        'Cristiana' => 'Cristiana',
                                                                        'Mormona' => 'Mormona',
                                                                        'Budista' => 'Budista',
                                                                        'Otro' => 'Otro'
                                                                    ],$expediente->religion) !!}
                                                                    <!--select name="Religion">
                                                                    <option value="Catolica">Catolica</option>
                                                                    <option value="Cristiana">Cristiana</option>
                                                                    <option value="Mormona">Mormona</option>
                                                                    <option value="Budista">Budista</option>
                                                                    </select-->
                                                                </td>	
								<td>Edad: </td><td> <input type="text" name="Edad" value="{{$expediente->edad}}"></td>					
							</tr>
						
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>	

							<tr>
                                                            <td>Fecha de Nacimiento:</td><td><input type="date" name="FechaNac" value="{{ $fecha2 }}"></td>	
                                                            <td>Lugar de Nacimiento:</td>
                                                            <td>
                                                                {!! Form::select('lugarNac',[
                                                                        'Aguascalientes' => 'Aguascalientes',
                                                                        'Baja California' => 'Baja California',
                                                                        'Baja California Sur' => 'Baja California Sur',
                                                                        'Campeche' => 'Campeche',
                                                                        'Colima' => 'Colima',
                                                                        'Chiapas' => 'Chiapas',
                                                                        'Coahuila' => 'Coahuila',
                                                                        'Chiahuahua' => 'Chiahuahua',
                                                                        'CDMX' => 'CDMX',
                                                                        'Durango' => 'Durango',
                                                                        'Guanajuato' => 'Guanajuato',
                                                                        'Guerrero' => 'Guerrero',
                                                                        'Hidalgo' => 'Hidalgo',
                                                                        'Jalisco' => 'Jalisco',
                                                                        'México' => 'México',
                                                                        'Michoacán' => 'Michoacán',
                                                                        'Morelos' => 'Morelos',
                                                                        'Nayarit' => 'Nayarit',
                                                                        'Nuevo León' => 'Nuevo León',
                                                                        'Oaxaca' => 'Oaxaca',
                                                                        'Puebla' => 'Puebla',
                                                                        'Querétaro' => 'Querétaro',
                                                                        'Quintana Roo' => 'Quintana Roo',
                                                                        'San Luis Potosí' => 'San Luis Potosí',
                                                                        'Sinaloa' => 'Sinaloa',
                                                                        'Sonora' => 'Sonora',
                                                                        'Tabasco' => 'Tabasco',
                                                                        'Tamaulipas' => 'Tamaulipas',
                                                                        'Tlaxcala' => 'Tlaxcala',
                                                                        'Veracruz' => 'Veracruz',
                                                                        'Yucatán' => 'Yucatán',
                                                                        'Zacatecas' => 'Zacatecas'                                                                        
                                                                    ],$expediente->lugar_nacimiento) !!}
                                                                <!--select name="lugarNac">
                                                                <option value="Aguascalientes">Aguascalientes</option>
                                                                <option value="D.F.">Distrito Federal</option>
                                                                <option value="Mexico">Estado de Mexico</option>
                                                                <option value="Tlaxcala">Tlaxcala</option>
                                                                </select-->
                                                            </td>	
							</tr>

							<tr>
                                                            <td class="Separador" colspan="6"></td>
							</tr>						
						
							<tr>
                                                            <td colspan="6"><h3>Direcci&oacute;n</h3></td>

							</tr>
								
							<tr>
                                                            <td>Calle: </td>
                                                            <td>
                                                                <input type="text" name="CalleNum" value="{{ $direccion[0]->calle or ""}}">
                                                            </td>
                                                            <td>N&uacute;mero: </td><td><input type="text" name="numerohouse" value="{{ $direccion[0]->numero or ""}}"></td>	
                                                            <td><label>C&oacute;digo Postal: </td> <td><input type="text" name="CodPostal" value="{{ $direccion[0]->codigopostal or ""}}"></td>
							</tr>
							

							<tr>
                                                            <td class="Separador" colspan="6"></td>	
							</tr>

							
							<tr>
								<td> Colonia </td> <td><input type="text" name="Colonia" required value="{{ $direccion[0]->colonia or ""}}"></td>	
								<td>Delegaci&oacute;n o Municipio: </td><td><input type="text" name="Municipio" value="{{ $direccion[0]->delegacion or ""}}"></td>	
								<td>Entidad:</td>
                                                                <td>
                                                                    {!! Form::select('estado',[
                                                                        'Aguascalientes' => 'Aguascalientes',
                                                                        'Baja California' => 'Baja California',
                                                                        'Baja California Sur' => 'Baja California Sur',
                                                                        'Campeche' => 'Campeche',
                                                                        'Colima' => 'Colima',
                                                                        'Chiapas' => 'Chiapas',
                                                                        'Coahuila' => 'Coahuila',
                                                                        'Chiahuahua' => 'Chiahuahua',
                                                                        'CDMX' => 'CDMX',
                                                                        'Durango' => 'Durango',
                                                                        'Guanajuato' => 'Guanajuato',
                                                                        'Guerrero' => 'Guerrero',
                                                                        'Hidalgo' => 'Hidalgo',
                                                                        'Jalisco' => 'Jalisco',
                                                                        'México' => 'México',
                                                                        'Michoacán' => 'Michoacán',
                                                                        'Morelos' => 'Morelos',
                                                                        'Nayarit' => 'Nayarit',
                                                                        'Nuevo León' => 'Nuevo León',
                                                                        'Oaxaca' => 'Oaxaca',
                                                                        'Puebla' => 'Puebla',
                                                                        'Querétaro' => 'Querétaro',
                                                                        'Quintana Roo' => 'Quintana Roo',
                                                                        'San Luis Potosí' => 'San Luis Potosí',
                                                                        'Sinaloa' => 'Sinaloa',
                                                                        'Sonora' => 'Sonora',
                                                                        'Tabasco' => 'Tabasco',
                                                                        'Tamaulipas' => 'Tamaulipas',
                                                                        'Tlaxcala' => 'Tlaxcala',
                                                                        'Veracruz' => 'Veracruz',
                                                                        'Yucatán' => 'Yucatán',
                                                                        'Zacatecas' => 'Zacatecas'                                                                        
                                                                    ],$direccion[0]->entidad) !!}
                                                                    <!--select name="estado">
                                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                                    <option value="D.F.">Distrito Federal</option>
                                                                    <option value="Mexico">Estado de Mexico</option>
                                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                                    </select-->
                                                                </td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>	
							</tr>

							<tr>
								<td>Teléfono: </td>	<td><input type="text" name="Telefono" value="{{ $direccion[0]->telefono or ""}}"></td>	
								<td>Institución de DerechoHabiencia:</td> 
                                                                <td>
                                                                    {!! Form::select('institucion',[
                                                                        'Ninguno' => 'Ninguno',
                                                                        'IMSS' => 'IMSS',
                                                                        'ISSEMYM' => 'ISSEMYM',
                                                                        'ISSFAM' => 'ISSFAM',
                                                                        'ISSTE' => 'ISSTE',
                                                                        'PEMEX' => 'PEMEX',
                                                                        'SEGURO POPULAR' => 'SEGURO POPULAR',
                                                                        'SSA' => 'SSA'
                                                                    ],$direccion[0]->idh)
                                                                    !!}
                                                                <!--select name="institucion">
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
                                                            </select-->
                                                                </td>
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
                                                            <td>Apellido Paterno: </td> <td><input type="text" name="APat" value="{{ $responsable[0]->paterno or ""}}"></td>
                                                            <td>Apellido Materno: </td> <td><input type="text" name="AMat" value="{{ $responsable[0]->materno or ""}}"></td>		
                                                            <td>Nombre(s): </td>  <td><input type="text" name="Nombre" value="{{ $responsable[0]->nombre or ""}}"></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td colspan ="2">En caso necesario comunicarse al Tel:</td><td><input type="text" name="TelAux" value="{{ $responsable[0]->telefono or ""}}"></td>	
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
								<td colspan="2"><textarea class="tam" name="MotivoCons" rows="6" cols="2">{{ $datosconsulta[0]->motivo or ""}}</textarea>									
							</tr>
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td >Nota de ingreso del paciente:</td>
								<td colspan="2"><textarea class="tam" name="Notaingreso" rows="6" cols="2">{{ $datosconsulta[0]->nota_ingreso or ""}}</textarea>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td ><label>Alerta sobre alguna alergia:</label></td>
								<td colspan="2"><textarea class="tam" name="Alertaalergia" rows="6" cols="2">{{ $datosconsulta[0]->alergia or ""}}</textarea>		
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<!--PReguntar aqui que informacion se necesita para capturar-->

							<tr>
								<td >Somatria y Signos Vitales: </td> <td><input type="text" name="signosvilates" value="{{ $datosconsulta[0]->somatria or ""}}"></td>			     
                                                                <td >Estatura: </td> <td><input type="text" name="Estatura" value="{{ $datosconsulta[0]->estatura or ""}}">Mts</td>	
								<td >Peso:</td> <td><input type="text" name="Peso" value="{{ $datosconsulta[0]->peso or ""}}">Kg</td>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td>Pulso:</td><td><input type="text" name="Pulso" value="{{ $datosconsulta[0]->pulso or ""}}">FC</td>						
								<td>Frecuencia Respiratoria: </td> <td><input type="text" name="FrecResp" value="{{ $datosconsulta[0]->frecuencia or ""}}">RPM</td>	
								<td>Tensi&oacute;n Arterial: </td> <td><input type="text" name="Tensionarterial" value="{{ $datosconsulta[0]->tension or ""}}">mm HG</td>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td>Temperatura Axilar:</td><td><input type="text" name="Temperatura" value="{{ $datosconsulta[0]->temperatura or ""}}">°C</td>					
								<td>Grupo Sanguineo:</td><td><input type="text" name="Sanguineo" value="{{ $datosconsulta[0]->sanguineo or ""}}"></td>								
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
            <?php
                echo $scrip;
            ?>

	</body>
</html>