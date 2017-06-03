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
                $('#form1 textarea').attr('readonly','readonly');
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
                                url:'{{url::asset('/')}}Profesor/Expediente/validar/',
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
                            data:{'tipo':'fisica'},
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
						<!--Se edita desde esta zona-->
					<h2>Exploracion Fisica</h2>
			
			<form method="post" action="{{url::asset('/')}}Expediente/Alta/Fisica" id="form1">
                            <table align="center" border="0" class="default">
				<tr>
					<td><label>Frenillo Labial</label></td>
                                        <td><textarea rows="3" cols="40"class="form" name="frenillo">{{ $frenillo }}</textarea></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>Lengua</label></td>
					<td><textarea rows="3" cols="40" class="form" name="lengua">{{ $lengua }}</textarea></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>Frenillo Lingual</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="lingual">{{ $lingual }}</textarea></td>
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				<tr>
					<td><label>Encias</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="encias">{{ $encias }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Paladar Duro</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="paduro">{{ $paduro }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Paladar Blando</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="pablando">{{ $pablando }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
			
				<tr>
					<td><label>Procesos Alveorales</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="alveorales">{{ $alveorales }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Orofaringe</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="faringe"> {{ $faringe }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Piso de boca</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="boca"> {{ $boca }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Glandulas Salivales</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="salival">{{ $salival }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
				
				<tr>
					<td><label>Carrillos</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="carrillos"> {{ $carrillos }}</textarea></td>
				</tr>

				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Region Yugal</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="yugal"> {{ $yugal }}</textarea></td>
				</tr>
				
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
			
				<tr>
					<td colspan="2"><h3>Hallasgos Radiograficos y de Laboratorio</h3></td>
					
				</tr>

				<tr>
					<td><label>¿Cuales?</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="hallazgos"> {{ $hallazgos }}</textarea></td>
					
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>

				<tr>
					<td><label>Observaciones</label></td>
                                        <td><textarea rows="3" cols="40" class="form" name="observaciones"> {{ $observaciones }}</textarea></td>
					
				</tr>
				<tr>
					<td class="Separador" colspan="2"></td>
				</tr>
                                </table>
                                </form>
    
                            <form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/ExplFisica" id="form2">
                            <fieldset>
                                    <table width='100%'>
                            <tr>
                                <td><label>Observaciones profesor:</label></td>
                                <td><textarea class="tam" name="observaprofesor" id="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)">{{$observaprofe}}</textarea>
                            </tr>

                            <tr>
                                    <td colspan="2"></br></td>
                            </tr>

                            <tr>
                                    <td colspan="2">
                                        <input type="submit" value="Guardar observaciones">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value="Validar sección" align="center" onclick="validar('Exploración fisica','fisica');">
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




