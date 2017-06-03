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
                    function inputs(){
                    
                        //get status from expediente...if equals to terminated, then block all the inputs
                        $.ajax({
                            type:'POST',
                            url:'{{url::asset('/')}}Expediente/validarStatus',
                            data:{'tipo':'resumen'},
                            success:function(data){
                                if(data == 5){
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
							<li><a href="{{url::asset('/')}}Alumno" class="button special">Menú</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
				<h2>Diagnostico General</h2>
			
				
                                <form method="post" action="{{url::asset('/')}}Expediente/Alta/Resumen" id="form1">
					<table border="0" align="center" class="default">
						<tr>
							<td><label>Diagnostico</label></td>
                                                        <td><textarea class="form" rows="3" cols="50" name="diagnostico">{{ $diagnostico }}</textarea></td>
						</tr>
						<tr>
							<td class="Separador" colspan="2"></td>
						</tr>

                                                <tr <?php if($observaprofe == NULL){echo "style='display: none;'";}else{echo "style='display: table-row;'";}?>>
                                                            <td><label>Observaciones profesor:</label></td>
                                                            <td><textarea class="tam" name="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)" disabled="true">{{$observaprofe}}</textarea>
							</tr>
							<tr>
                                                            <td class="Separador" colspan="6"></td>
							</tr>
						<tr>
							<td class="Separador" colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Guardar datos"></td>
						</tr>
					</table>	
				</form>
			

			
					
			</fieldset>
			
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


