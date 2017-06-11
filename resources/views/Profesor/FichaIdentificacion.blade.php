<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/inputsStyle.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->		
                <script type="text/javascript">
                    
                    function validar(){
                        var a = confirm('¿Desea validar '+arguments[0]+'?');
                        var saved = arguments[0];
                        
                        var observa = document.getElementById("observaprofesor").value;
                        if(a){
                            //get id expediente y set status from direccion in 5
                            $.ajax({
                                type:'POST',
                                url:'{{url::asset('/')}}Profesor/Expediente/validar',
                                data:{'tipo':arguments[1],'obs':observa},
                                success:function(data){
                                    alert(saved+' validado');
                                    window.location.href = '{{url::asset('/')}}Profesor/Expediente/principal';
                               }
                            },10000);
                        }
                    }
                    
                    function inputs(){                    
                        //get status from expediente...if equals to terminated, then block all the inputs
                        $.ajax({
                            type:'POST',
                            url:'{{url::asset('/')}}Expediente/validarStatus',
                            data:{'tipo':'fichadireccion'},
                            success:function(data){
                                if(data == 5){
                                    //alert(data);
                                    $('#form1 *').attr('readonly','readonly');
                                    $('#form1 *').attr('disabled','disabled');                                    
                                }
                            }
                        },10000);
                    }
                </script>
	</head>
        <body class="index" onload="inputs();">
		<div id="page-wrapper">

			<!-- Header -->
                        <header id="header" class="alt">					
                            <nav id="nav">
                                    <ul>
                                        <li class="submenu">
                                        <li><a href="{{url::asset('/')}}Profesor" class="button special">Menú</a></li>							
                                    </ul>
                            </nav>
                        </header>

			<!-- Banner -->
				<section id="banner">
					<!--div class="inner"-->
						<!--Se edita desde esta zona-->
					<h2>FICHA DE IDENTIFICACIÓN</h2>
				
                                        <form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/Ficha" id="form1">
                                                <fieldset>
                                                <table border="0" align="center" class="default">
						<tr>
                                                    <td>Nombre de la instituci&oacute;n:</td> <td><input type="text" name="Institucion" value="{{ $clinica }}" hidden="true" readonly="true"></td>
                                                    <td>Numero de Expediente: </td> <td><input type="text" name="NumExpediente" value="{{ Session::get('folioexpediente') }}" readonly="true"></td>
                                                    <td>Fecha de inicio: </td> <td><input type="date" name="FechaInicio" value="{{ $fecha1 }}" readonly="true"></td>			
						</tr>
												
						<tr>
                                                    <td class="Separador" colspan="3"></td>
						</tr>
									
						<tr>
                                                    <td>CURP:</td>	<td><input type="text" name="curp" value="{{ $expediente->curp }}" readonly="true"></td>	
                                                    <td>Fotografia: </td> <td><input type="file" name="fotografia" readonly="true"></td> <!--it coould be an image-->	
						</tr>

						<tr>
                                                    <td class="Separador" colspan="3"></td>
						</tr>

												
						<tr>
                                                    <td><label>Numero de Recibo de Expediente: </label></td>
                                                    <td><input type="text" name="NumReciboExpediente" value="{{$expediente->recibo_pago}}" readonly="true"></td>	
						</tr>


						<tr>
                                                    <td class="Separador" colspan="3"></td>
						</tr>						

						<tr>
                                                    <td colspan="6"><h3>Datos del Paciente<h3></td>
						</tr>
						<tr>
                                                    <td>Apellido Paterno: </td> <td><input type="text" name="APat" value="{{$expediente->ap_paterno}}" readonly="true"></td>	
                                                    <td>Apellido Materno: </td> <td><input type="text" name="AMat" value="{{$expediente->ap_materno}}" readonly="true"></td>
                                                    <td>Nombre(s): </td>  <td><input type="text" name="Nombre" value="{{$expediente->nombre_paciente}}" readonly="true"></td>	
						</tr>

						<tr>
                                                    <td class="Separador" colspan="6"></td>
						</tr>

							<tr>
								<td>Genero:</td> <td><select name="GeneroPaciente" disabled="true">
                                                                @if($expediente->genero == 'masculino')
                                                                        <option value="Masculino" selected="true">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                @else                                                                
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino" selected="true">Femenino</option>
                                                                @endif
                                                                </select></td>	
                                                                
								<td>Ocupacion: </td> <td><input type="text" name="Ocupacion" value='{{$expediente->ocupacion}}' readonly="true"></td>
								<td>Escolaridad: </td> 
                                                                <td>
                                                                    {!! Form::select('escolaridad',[
                                                                        'Preparatoria',
                                                                        'Universidad'
                                                                    ],$expediente->escolaridad,
                                                                    ['disabled' => 'true']) !!}
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
                                                                    ],$expediente->estadocivil,
                                                                    ['disabled' => 'true']) !!}
                                                                </td>	
								<td>Religi&oacute;n:</td> 
                                                                <td>
                                                                    {!! Form::select('Religion',[
                                                                        'Catolica' => 'Catolica',
                                                                        'Cristiana' => 'Cristiana',
                                                                        'Mormona' => 'Mormona',
                                                                        'Budista' => 'Budista',
                                                                        'Otro' => 'Otro'
                                                                    ],$expediente->religion,
                                                                    ['disabled' => 'true']) !!}
                                                                </td>	
                                                                <td>Edad: </td><td> <input type="text" name="Edad" value="{{$expediente->edad}}" readonly="true"></td>					
							</tr>
						
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>	

							<tr>
                                                            <td>Fecha de Nacimiento:</td><td><input type="date" name="FechaNac" value="{{ $fecha2 }}" readonly="true"></td>	
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
                                                                    ],$expediente->lugar_nacimiento,
                                                                    ['disabled' => 'true']) !!}
                                                            </td>	
							</tr>

							<tr>
                                                            <td class="Separador" colspan="3"></td>
							</tr>						
						
							<tr>
                                                            <td colspan="6"><h3>Direcci&oacute;n</h3></td>

							</tr>
								
							<tr>
                                                            <td>Calle: </td>
                                                            <td>
                                                                <input type="text" name="CalleNum" value="{{ $direccion[0]->calle or ""}}" readonly="true">
                                                            </td>
                                                            <td>N&uacute;mero: </td><td><input type="text" name="numerohouse" value="{{ $direccion[0]->numero or ""}}" readonly="true"></td>	
                                                            <td><label>C&oacute;digo Postal: </td> <td><input type="text" name="CodPostal" value="{{ $direccion[0]->codigopostal or ""}}" readonly="true"></td>
							</tr>
							

							<tr>
                                                            <td class="Separador" colspan="6"></td>	
							</tr>

							
							<tr>
                                                            <td> Colonia </td> <td><input type="text" name="Colonia" required value="{{ $direccion[0]->colonia or ""}}" readonly="true"></td>	
                                                            <td>Delegaci&oacute;n o Municipio: </td><td><input type="text" name="Municipio" value="{{ $direccion[0]->delegacion or ""}}" readonly="true"></td>	
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
                                                                    ],$direccion[0]->entidad,
                                                                    ['disabled' => 'true']) !!}
                                                                </td>	
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>	
							</tr>

							<tr>
                                                            <td>Teléfono: </td>	<td><input type="text" name="Telefono" value="{{ $direccion[0]->telefono or ""}}" readonly="true"></td>	
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
                                                                    ],$direccion[0]->idh,
                                                                    ['disabled' => 'true'])
                                                                    !!}
                                                                </td>
							</tr>
							

							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>
							<tr>
								<td colspan="6"><h4>En el interrogatorio indirecto nombre y parentezco de la persona que proporciona información</h4></td>
							</tr>	

							<tr>
                                                            <td>Apellido Paterno: </td> <td><input type="text" name="APat" value="{{ $responsable[0]->paterno or ""}}" readonly="true"></td>
                                                            <td>Apellido Materno: </td> <td><input type="text" name="AMat" value="{{ $responsable[0]->materno or ""}}" readonly="true"></td>		
                                                            <td>Nombre(s): </td>  <td><input type="text" name="Nombre" value="{{ $responsable[0]->nombre or ""}}" readonly="true"></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>

							<tr>
                                                            <td colspan ="2">En caso necesario comunicarse al Tel:</td><td><input type="text" name="TelAux" value="{{ $responsable[0]->telefono or ""}}" readonly="true"></td>	
							</tr>

							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>
							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>

							<tr>
								<td colspan="6"><h3>Datos Sobre Consulta </h3></td>									
							</tr>

							<tr>
								<td >Motivo de Consulta:</td>
                                                                <td colspan="2"><textarea class="tam" name="MotivoCons" rows="6" cols="2" readonly="true">{{ $datosconsulta[0]->motivo or ""}}</textarea>									
							</tr>
							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>

							<tr>
								<td >Nota de ingreso del paciente:</td>
                                                                <td colspan="2"><textarea class="tam" name="Notaingreso" rows="6" cols="2" readonly="true">{{ $datosconsulta[0]->nota_ingreso or ""}}</textarea>									
							</tr>

							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>

							<tr>
								<td ><label>Alerta sobre alguna alergia:</label></td>
                                                                <td colspan="2"><textarea class="tam" name="Alertaalergia" rows="6" cols="2" readonly="true">{{ $datosconsulta[0]->alergia or ""}}</textarea>		
							</tr>

							<tr>
								<td class="Separador" colspan="3"></td>
							</tr>

							<!--PReguntar aqui que informacion se necesita para capturar-->

							<tr>
                                                            <td >Somatria y Signos Vitales: </td> <td><input type="text" name="signosvilates" value="{{ $datosconsulta[0]->somatria or ""}}" readonly="true"></td>			     
                                                            <td >Estatura: </td> <td><input type="text" name="Estatura" value="{{ $datosconsulta[0]->estatura or ""}}" readonly="true">Mts</td>	
                                                            <td >Peso:</td> <td><input type="text" name="Peso" value="{{ $datosconsulta[0]->peso or ""}}" readonly="true">Kg</td>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
                                                            <td>Pulso:</td><td><input type="text" name="Pulso" value="{{ $datosconsulta[0]->pulso or ""}}" readonly="true">FC</td>						
                                                            <td>Frecuencia Respiratoria: </td> <td><input type="text" name="FrecResp" value="{{ $datosconsulta[0]->frecuencia or ""}}" readonly="true">RPM</td>	
                                                            <td>Tensi&oacute;n Arterial: </td> <td><input type="text" name="Tensionarterial" value="{{ $datosconsulta[0]->tension or ""}}" readonly="true">mm HG</td>									
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
                                                            <td>Temperatura Axilar:</td><td><input type="text" name="Temperatura" value="{{ $datosconsulta[0]->temperatura or ""}}" readonly="true">°C</td>					
                                                            <td>Grupo Sanguineo:</td><td><input type="text" name="Sanguineo" value="{{ $datosconsulta[0]->sanguineo or ""}}" readonly="true"></td>								
							</tr>

							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>

							<tr>
								<td colspan="3"><label>Observaciones profesor:</label></td>
                                                                <td ><textarea class="tam" id="observaprofesor" name="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)">{{$expediente->profe_observa}}</textarea>		
							</tr>
							<tr>
								<td class="Separador" colspan="6"></td>
							</tr>
							<tr>
                                                            <td colspan="6">
                                                                <input type="submit" value="Guardar observaciones" align="center">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="button" value="Validar sección" align="center" onclick="validar('Ficha de identificación','fichadireccion');">
                                                            </td>
							</tr>
                                    </table>	
                                                </fieldset>
                                </form>	
				<!--Se ternina de editar aqui-->
			<!--/div--> 
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