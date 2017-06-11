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

        <script>
            function blockall(){
                $('#form1 input').attr('readonly','readonly');
                $('#form1 select').attr('disabled','disabled');
                $('#form1 input').attr('disabled','disabled');                                
            }
            
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
                    data:{'tipo':'nopato'},
                    success:function(data){
                        if(data == 5){
                            //alert(data);
                            $('#form2 *').attr('readonly','readonly');
                            $('#form2 *').attr('disabled','disabled');                                    
                        }
                    }
                },10000);
            }
        </script>
        
	</head>
        <body class="index" onload="blockall(); inputs();">
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
					<div class="inner">
                                            <form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/Nopatologico" id="form1">
						<!--Se edita desde esta zona-->
					<h2>Antecedentes Personales No Patológicos</h2>
                                        <fieldset>
					<h3>Inmunizaciones</h3>
					<table border ="0" align="center" class="default">
                                         
                                        <?php 
                                        $opciones = ["Esquema completo","En proceso","Esquema incompleto","Ninguna dosis","Lo ignora"];
                                        $enfermedades = ["Tuberculosis","Poliomielitis (Sabin)","Pentavalente (DPT+HB+HIB)","Difteria, tosferina y tétanos","Sarampión, rubeola y parotiditis","Hepatitis B","Otra"];
                                        
                                        foreach ($variable as $key => $enfermedad)
                                        {
                                                                                                        //get the union of words...
                                        $newstring = str_replace(" ", "", $key);

                                        ?>
					<tr>
                                            <td><label><?= $key; ?></label></td>                                                
                                            <td>    
                                                <select name="<?=$newstring?>">
                                                    <?php if($enfermedad == "Selecciona"){ ?>
                                                        <option value="Selecciona" selected="true">Selecciona</option>
                                                        <option value="Esquemacompleto">Esquema completo</option>
                                                        <option value="EnProceso">En proceso</option>
                                                        <option value="Esquemaincompleto">Esquema incompleto</option>
                                                        <option value="Ningunadosis">Ninguna dosis</option>
                                                        <option value="Loignora">Lo ignora</option>
                                                    <?php }else if($enfermedad == "Esquemacompleto"){ ?>
                                                        <option value="Selecciona">Selecciona</option>
                                                        <option value="Esquemacompleto" selected="true">Esquema completo</option>
                                                        <option value="EnProceso">En proceso</option>
                                                        <option value="Esquemaincompleto">Esquema incompleto</option>
                                                        <option value="Ningunadosis">Ninguna dosis</option>
                                                        <option value="Loignora">Lo ignora</option>
                                                    <?php }else if($enfermedad == "EnProceso"){ ?>
                                                        <option value="Selecciona">Selecciona</option>
                                                        <option value="Esquemacompleto">Esquema completo</option>
                                                        <option value="EnProceso" selected="true">En proceso</option>
                                                        <option value="Esquemaincompleto">Esquema incompleto</option>
                                                        <option value="Ningunadosis">Ninguna dosis</option>
                                                        <option value="Loignora">Lo ignora</option>
                                                    <?php }else if($enfermedad == "Esquemaincompleto"){ ?>
                                                        <option value="Selecciona">Selecciona</option>
                                                        <option value="Esquemacompleto">Esquema completo</option>
                                                        <option value="EnProceso">En proceso</option>
                                                        <option value="Esquemaincompleto" selected="true">Esquema incompleto</option>
                                                        <option value="Ningunadosis">Ninguna dosis</option>
                                                        <option value="Loignora">Lo ignora</option>
                                                    <?php }else if($enfermedad == "Ningunadosis"){ ?>
                                                        <option value="Selecciona">Selecciona</option>
                                                        <option value="EsquemaCompleto">Esquema completo</option>
                                                        <option value="EnProceso">En proceso</option>
                                                        <option value="EsquemaIncompleto">Esquema incompleto</option>
                                                        <option value="Ningunadosis" selected="true">Ninguna dosis</option>
                                                        <option value="Loignora">Lo ignora</option>
                                                    <?php }else if($enfermedad == "Loignora"){ ?>
                                                        <option value="Selecciona">Selecciona</option>
                                                        <option value="Esquemacompleto">Esquema completo</option>
                                                        <option value="EnProceso">En proceso</option>
                                                        <option value="Esquemaincompleto">Esquema incompleto</option>
                                                        <option value="Ningunadosis">Ninguna dosis</option>
                                                        <option value="Loignora" selected="true">Lo ignora</option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        
					<!--tr>		
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
					</tr-->
				</table>	
                        
			</fieldset>
                        <fieldset>
                        <h3>Toxicoman&iacute;as</h3>
                            <table border ="0" align="center">
                                <?php
                                    $i=0;
                                    $toxiarreglo= ["toxico0","toxico1","toxico2","toxico3"];
                                    $titles= ["Consumo de alcohol","Consumo de tabaco","Drogas","Otro(Especifique)"];
                                    foreach ($toxicos as $key => $value) {
                                        
                                        if($i == count($titles)-1){ ?>
                                        <tr>
                                            <td><label>Otra(Especifique)</label></td>
                                            <td><input type="text" name="<?=$key;?>" class="form" value="<?=$value;?>"></td>
                                        </tr>

                                            <?php
                                            continue;
                                        }
                                        
                                        if($value == ""){
                                ?>
                                <tr>
                                    <td><label><?=$titles[$i];?></label></td>
                                    <td><input type="checkbox" name=<?=$key;?>></td>
                                </tr>

                                <?php
                                        } else { ?>
                                <tr>
                                    <td><label><?=$titles[$i];?></label></td>
                                    <td><input type="checkbox" name="<?=$key;?>" checked="true"></td>
                                </tr>
                                <?php
                                        }
                                        $i += 1;
                                    }
                                ?>
                                <!--tr>
                                    <td><label>Consumo de alcohol</label></td>
                                    <td><input type="checkbox" name="toxico0"></td>
                                </tr>
                                <tr>
                                    <td><label>Consumo de tabaco</label></td>
                                    <td><input type="checkbox" name="toxico1"></td>
                                </tr>	
                                <tr>
                                    <td><label>Drogas</label></td>
                                    <td><input type="checkbox" name="toxico2"></td>
                                </tr>			
                                <tr>
                                    <td><label>Otra(Especifique)</label></td>
                                    <td><input type="text" name="toxico3" class="form"></td>
                                </tr-->
                            </table>
			</fieldset>

			<fieldset>
				<h3>H&aacute;bitos</h3>
                                <table border ="0" align="center">
                                <?php
                                    $i=0;
                                    $toxiarreglo= ["habito0","habito1"];
                                    $titleshabitos= ["Deporte","Otro(Especifique)"];
                                    foreach ($habitos as $key => $value) {
                                        
                                        if($i == count($titleshabitos)-1){ ?>
                                        <tr>
                                            <td><label>Otra(Especifique)</label></td>
                                            <td><input type="text" name="<?=$key;?>" class="form" value="<?=$value;?>"></td>
                                        </tr>

                                            <?php
                                            continue;
                                        }
                                        
                                        if($value == ""){
                                ?>
                                <tr>
                                    <td><label><?=$titleshabitos[$i];?></label></td>
                                    <td><input type="checkbox" name=<?=$key;?>></td>
                                </tr>

                                <?php
                                        } else { ?>
                                <tr>
                                    <td><label><?=$titleshabitos[$i];?></label></td>
                                    <td><input type="checkbox" name="<?=$key;?>" checked="true"></td>
                                </tr>
                                <?php
                                        }
                                        $i += 1;
                                    }
                                ?>
                                
                            </table>	
			</fieldset>

			<fieldset>
				<h3>Alimentaci&oacute;n y vivienda</h3>
				<table border="0" align="center">
					<tr>
                                            <td><label>Vivienda</label></td>
                                            <td>
                                                {!! Form::select('vivienda0',[
                                                    'Propia' => 'Propia',
                                                    'Enpago' => 'En pago',
                                                    'Rentada' => 'Rentada',
                                                    'Prestada' => 'Prestada'
                                                ],$vivienda0) !!}
                                                <!--select class="form">
                                                    <option value="Propia">Propia</option>
                                                    <option value="En pago">En pago</option>
                                                    <option value="Rentada">Rentada</option>
                                                    <option value="Prestada">Prestada</option>
                                                </select-->
                                            </td>
					</tr>
					<tr>
						<td><label>No de habitaciones en la casa</label></td>
						<td>
                                                {!! Form::select('vivienda1',[
                                                    'Menosde3' => 'Menos de 3',
                                                    'Entre4y6' => 'Ente 4 y 6',
                                                    'Masde6' => 'Mas de 6'
                                                ],$vivienda1) !!}

                                                    <!--select class="form">
                                                        <option value="Menos de 3">Menos de 3</option>
                                                        <option value="Entre 4 y 6">Entre 4 y 6</option>
                                                        <option value="Mas de 6">Mas de 6</option>
                                                    </select-->
                                                </td>
					</tr>
					<tr>
						<td><label>Personas en la vivienda</label></td>
						<td>
                                                {!! Form::select('vivienda2',[
                                                    'De1a3' => 'De 1 a 3',
                                                    'De4a7' => 'De 4 a 7',
                                                    'Masde7' => 'Mas de 7'
                                                ],$vivienda2) !!}

                                                    <!--select class="form">
								<option value="De 1 a 3">De 1 a 3</option>
								<option value="De 4 a 7">De 4 a 7</option>
								<option value="Mas de 7">M&aacute;s de 7</option>
							</select-->
                                                </td>
					</tr>
					
					<tr>
						<td><label>Personas en la familia</label></td>
						<td>
                                                {!! Form::select('vivienda3',[
                                                    'De1a3' => 'De 1 a 3',
                                                    'De4a7' => 'De 4 a 7',
                                                    'Masde7' => 'Mas de 7'
                                                ],$vivienda3) !!}

                                                    <!--select class="form">
								<option value="De 1 a 3">De 1 a 3</option>
								<option value="De 4 a 7">De 4 a 7</option>
								<option value="Mas de 7">M&aacute;s de 7</option>
							</select-->
                                                </td>
					</tr>	

					<tr>
						<td><label>Personas que trabajan</label></td>
						<td>
                                                {!! Form::select('vivienda4',[
                                                    'Soloelpadre' => 'Solo el padre',
                                                    'Sololamadre' => 'Solo la madre',
                                                    'Ambos' => 'Ambos'
                                                ],$vivienda4) !!}

                                                    
                                                    <!--select class="form">
								<option value="Solo Padre">Solo el padre</option>
								<option value="Solo la Madre">Solo la Madre</option>
								<option value="Ambos">Ambos</option>
							</select-->
                                                </td>
					</tr>	

					<tr>
						<td><label>Personas menores de 15 a&ntilde;os</label></td>
						<td>
                                                {!! Form::select('vivienda5',[
                                                    '1' => 'De 1 a 3',
                                                    '2' => 'De 4 a 7',
                                                    'Mas de 7' => 'Mas de 7'
                                                ],$vivienda5) !!}
                                                    
                                                    <!--select class="form">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="Mas de 3">Mas de 3</option>
							</select-->
                                                </td>
					</tr>
					<tr>
						<td class="Separador" colspan="2"></td>
					</tr>
                                </table>
                        </fieldset>
                                        
                        <fieldset>
                            <table border ="0" align="center">
                                <?php
                                    $i=0;
                                    //$servicios= ["servicio0","servicio1","servicio2","servicio3"];

                                    $toxiarreglo= ["habito0","habito1"];
                                    $titleshabitos= ["Agua potable","Pavimentación","Drenaje","Luz","Otra(Especifique)"];
                                    foreach ($servicios as $key => $value) {
                                        
                                        if($i == count($titleshabitos)-1){ ?>
                                        <tr>
                                            <td><label>Otra(Especifique)</label></td>
                                            <td><input type="text" name="<?=$key;?>" class="form" value="<?=$value;?>"></td>
                                        </tr>

                                            <?php
                                            continue;
                                        }
                                        
                                        if($value == ""){
                                ?>
                                <tr>
                                    <td><label><?=$titleshabitos[$i];?></label></td>
                                    <td><input type="checkbox" name=<?=$key;?>></td>
                                </tr>

                                <?php
                                        } else { ?>
                                <tr>
                                    <td><label><?=$titleshabitos[$i];?></label></td>
                                    <td><input type="checkbox" name="<?=$key;?>" checked="true"></td>
                                </tr>
                                <?php
                                        }
                                        $i += 1;
                                    }
                                ?>
                                
                            </table>
                                <!--table>
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
					
				</table-->
                                </fieldset>
                                <!--fieldset>
                                    <table width='100%'>
                                        						
						<tr>
                                                    <td>Observaciones</td><td colspan="2"><textarea class="tam" rows="6" cols="2" name="observa" readonly="true">{{ $observacionesss }}</textarea></td>
						</tr>
                                   

                                        <tr>
						<td class="Separador" colspan="2"></td>
					</tr>
                                                <tr>
                                                    <td>Observaciones <br/>profesor:</td>
                                                        <td colspan ="2"><textarea class="tam" name="observaprofesor" id="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)">{{ $observacionesprofe }}</textarea></td>
                                                </tr>
                                                <tr>
                                                    <td class="Separador" colspan="6"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><input type="submit" value="Guardar datos"></td>                                                
                                                </tr>
                                    </table>
                                </fieldset-->

                            </form>
                            <form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/NoPatologico" id="form2">
                            <fieldset>
                                    <table width='100%'>
                                        <tr>
                                            <td>Observaciones</td><td colspan="2"><textarea class="tam" rows="6" cols="2" name="observa" readonly="true">{{ $observacionesss }}</textarea></td>
                                        </tr>
                                        <tr>
						<td class="Separador" colspan="2"></td>
					</tr>
                                        <tr>
                                            <td>Observaciones <br/>profesor:</td>
                                                <td colspan ="2"><textarea class="tam" name="observaprofesor" id="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)">{{ $observacionesprofe }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="Separador" colspan="6"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" value="Guardar datos">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="button" value="Validar sección" align="center" onclick="validar('Antecedentes no patológicos','nopato');">
                                            </td>                                                
                                        </tr>
                                    </table>
                                </fieldset>
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
