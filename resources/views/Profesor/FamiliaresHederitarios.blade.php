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
                            data:{'tipo':'familiares'},
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
					<div class="inner">
						<!--Se edita desde esta zona-->
					<h2>FAMILIARES HEREDITARIOS</h2>
		
                                        <form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/Heredofam" id="form1">
			<table align ="center" border="0" class="default">
			<tr>
				<td>Padecimientos</td>				
				<td>Madre</td>
				<td>Padre</td>
				<td>Hermanos</td>
				<td>Abuela</td>
				<td>Abuelo</td>
				<td>Otros</td>
			</tr>
                        
                            <?php
                                $i=0;

                                $tipos = ["diabetes","arterial","cardiopatias","neoplasias","epilepsias","malformaciones","sida","renales","hepatitis","artritis","otra"];//,'padre','hermano','abuela','abuela','otro'];
                                $names = ["madre","padre","hermano","abuela","abuelo","otro"];
                                foreach ($variable as $key => $value) {?>
                                    <tr>
                                    <td><?=$key;?></td>
                                    <?php
                                    //foreach ($value as $llave => $clave){
                                    foreach ($names as $clave){
                                        ?>
                                        <td>
                                            <?php                                                               
                                                if((isset($value[$clave])) && ($value[$clave] != "")){ ?>
                                            <input type="checkbox" name="<?= $key."$i"; ?>" checked="true" disabled="true">
                                            <?php }else{ ?>
                                            <input type="checkbox" name="<?= $key."$i"; ?>" disabled="true">
                                                <?php                                                 
                                                    }
                                                //}
                                            ?>
                                        </td>
                            <?php
                                    $i += 1;
                                    }    
                                    $i=0;
                                    ?>
                                    </tr>
                            <?php
                                }
                            ?>
                        <tr>
                            <td class="Separador" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Observaciones</td><td colspan ="6"><textarea class="tam" name="observaciones" rows="6" cols="2" readonly="true">{{ $observaciones }}</textarea></td>
			</tr>
                        <tr>
                                <td class="Separador" colspan="6"></td>
                        </tr>
                        <tr>
                            <td class="Separador" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Observaciones <br/>profesor:</td><td colspan ="6"><textarea class="tam" name="observaprofesor" id="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)">{{ $observacionesprofe }}</textarea></td>
			</tr>
                        <tr>
                                <td class="Separador" colspan="6"></td>
                        </tr>
			<tr>
				<td colspan ="7"> 
                                    <input type="submit" value="Guardar observaciones">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="button" value="Validar sección" align="center" onclick="validar('Familiares hereditarios','familiares');">
                                </td>
			</tr>	

                        <!--tr>
				<td>Hipertension Arterial</td>
                            <td>
                                @if((isset($diabetes["madre"])) && ($diabetes["madre"] != ""))
                                <input type="checkbox" name="diabetes0" checked="true">
                                @else
                                <input type="checkbox" name="diabetes0">
                                @endif
                            </td>

                            <td>
                                @if((isset($diabetes["padre"])) && ($diabetes["padre"] != ""))
                                <input type="checkbox" name="diabetes1" checked="true">
                                @else
                                <input type="checkbox" name="diabetes1">
                                @endif
                            </td>
                            <td>
                                @if((isset($diabetes["hermano"])) && ($diabetes["hermano"] != ""))
                                <input type="checkbox" name="diabetes2" checked="true">
                                @else
                                <input type="checkbox" name="diabetes2">
                                @endif
                            </td>
                            <td>
                                @if((isset($diabetes["abuela"])) && ($diabetes["abuela"] != ""))
                                <input type="checkbox" name="diabetes3" checked="true">
                                @else
                                <input type="checkbox" name="diabetes3">
                                @endif
                            </td>
                            <td>
                                @if((isset($diabetes["abuelo"])) && ($diabetes["abuelo"] != ""))
                                <input type="checkbox" name="diabetes4" checked="true">
                                @else
                                <input type="checkbox" name="diabetes4">
                                @endif
                            </td>
                            <td>
                                @if((isset($diabetes["otro"])) && ($diabetes["otro"] != ""))
                                <input type="checkbox" name="diabetes5" checked="true">
                                @else
                                <input type="checkbox" name="diabetes5">
                                @endif
                            </td>
			</tr>
			</tr-->	
		
		</table>
	</form>		
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
