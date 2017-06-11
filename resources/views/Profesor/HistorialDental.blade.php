<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
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
							<li><a href="{{URL::asset('/')}}Profesor/Expediente/HigOral" class="button special">Regresar</a></li>
							
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
					<h3>Odontograma paciente</h3>
					<br>

				<img src="{{url::asset('/')}}imagenes/Odontograma.jpg" USEMAP="#Odontograma">

				<map name="Odontograma">
					<!--Parte superior del odontogranma-->
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/18" shape="circle" coords="30,56,47" alt="18">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/17" shape="circle" coords="50,56,47" alt="17">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/16" shape="circle" coords="90,56,47" alt="16">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/15" shape="circle" coords="128,56,47" alt="15">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/14" shape="circle" coords="150,56,47" alt="14">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/13" shape="circle" coords="188,56,47" alt="13">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/12" shape="circle" coords="215,56,47" alt="12">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/11" shape="circle" coords="250,56,47" alt="11">

					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/21" shape="circle" coords="310,56,40" alt="21">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/22" shape="circle" coords="340,56,47" alt="22">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/23" shape="circle" coords="380,56,47" alt="23">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/24" shape="circle" coords="410,56,47" alt="24">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/25" shape="circle" coords="450,56,40" alt="25">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/26" shape="circle" coords="480,56,40" alt="26">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/27" shape="circle" coords="510,56,40" alt="27">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/28" shape="circle" coords="580,56,30" alt="28">

					<!--Parte inferior del odontograma-->
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/48" shape="circle" coords="30,255,30" alt="48">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/47" shape="circle" coords="70,255,30" alt="47">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/46" shape="circle" coords="110,255,30" alt="46">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/45" shape="circle" coords="140,255,30" alt="45">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/44" shape="circle" coords="170,255,30" alt="44">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/43" shape="circle" coords="200,255,30" alt="43">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/42" shape="circle" coords="240,255,30" alt="42">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/41" shape="circle" coords="275,255,30" alt="41">

					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/31" shape="circle" coords="320,255,30" alt="31">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/32" shape="circle" coords="350,255,30" alt="32">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/33" shape="circle" coords="380,255,30" alt="33">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/34" shape="circle" coords="410,255,30" alt="34">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/35" shape="circle" coords="440,255,30" alt="35">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/36" shape="circle" coords="470,255,30" alt="36">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/37" shape="circle" coords="535,255,25" alt="37">
					<area href="{{URL::asset('/')}}Profesor/Expediente/HigOral/HistorialDental/38" shape="circle" coords="560,255,30" alt="38">
				</map>

				<br>
				@if(count($errors))
                        <h5 style="color: #FAF834;">Favor de llenar los campos marcados con *</h5>
                    @endif
				<br>
				<h4>Ingresar nuevo diagnostico y tratamiento</h4>
				<h5>Id diente: {{$diente}}</h5>
				<!--form method="POST" action="{{url::asset('/')}}Expediente/HigOral/Odont">
					<input type="hidden" name="diente" value="{{$diente}}">
					<table border="0" align="center" class="od">
						<tr>
							<td>*Diagnóstico:</td>
							<td><select name="diagnostico">
									<option value="Diente sano">Diente sano</option>
									<option value="Caries dental">Caries dental</option>
									<option value="Caries limitada al esmalte">Caries limitada al esmalte</option>
									<option value="Caries de la dentina">Caries de la dentina</option>
									<option value="Caries del cemento ">Caries del cemento</option>
									<option value="Caries dentaria detenida">Caries dentaria detenida</option>
									<option value="Caries dental, no especificada">Caries dental no especificada</option>
									<option value="Atrición excesica de los dientes ">Atrición excesiva de los dientes</option>
									<option value="Abrasión dentaria">Abrasión dentaria</option>
									<option value="Cálculos supragingivales">Cálculos supragingivales</option>
									<option value="Cálculos subgingivales">Cálculos subgingivales</option>
									<option value="Placa dental o placa bacteriana">Placa dental o placa bacteriana</option>
									<option value="Sensibilidad dentinaria">Sensibilidad dentinaria</option>
									<option value="Pulpitis">Pulpitis</option>
									<option value="Necrisis de la pulpa">Necrosis de la pulpa</option>
									<option value="Absceso periapical con fístula">Absceso periapical con fístula</option>
									<option value="Gingivitis y enfermeddes periodontales">Gingivitis y enfermedades periodontales</option>
									<option value="Pericoronitis aguda">Pericoronitis aguda</option>
									<option value="Periodontitis">Periodontitis</option>
									<option value="Periodontosis">Periodontosis</option>
									<option value="Retracción gingival">Retracción gingival</option>
									<option value="Hiperplasia gingival">Hiperplasia gingival</option>
									<option value="Apiñamiento">Apiñamiento</option>
									<option value="Giroversión">Giroversión</option>
									<option value="Pérdida de diente debido a accidente, extracción o enfermedad periodontal local">Pérdida de dientes debido a accidente, extracción o enfermedad periodontal local</option>
									<option value="Torus">Torus</option>
								</select>
							</td>
							<td>&nbsp;&nbsp;&nbsp;*Fecha:</td>
							<td><input type="date" name="FechaDiagn"></td>
						</tr>

						<tr>
							<td class="Separador"></td>
						</tr>

						<tr>
							<td>*Tratamiento:</td>
							<td><select name="tratamiento">
									<option value="4-521 Selladores de fisura">4-521 Selladores de fisura</option>
									<option value="5-230 Extracción">5-230 Extracción</option>
									<option value="5-231 Cirugía">5-231 Cirugía</option>
									<option value="5-232 Obturación de Dientes con Resina">5-232 Obturación de Dientes con Resina</option>
									<option value="5-233 Obturación de Dientes Incrustación">5-233 Obturación de Dientes Incrustación</option>
									<option value="5-234 Prótesis Parcial Fija">5-234 Prótesis Parcial Fija</option>
									<option value="5-234/1 Incrustaciones OnLay">5-234/1 Incrustaciones OnLay</option>
									<option value="5-234/2 Coronas 3/4">5-234/2 Coronas 3/4</option>
									<option value="5-234/E Postes Intrarradiculares">5-234/E Postes Intrarradiculares</option>
									<option value="5-234/I Coronas Prefabricadas">5-234/I Coronas Prefabricadas</option>
									<option value="5-234/P Pónticos">5-234/P Pónticos</option>
									<option value="5-234/T Coronas Totales">5-234/T Coronas Totales</option>
									<option value="5-234/T2 Coronas Veener">5-234/T2 Coronas Veener</option>
									<option value="5-234/T3 Jacket Crown">5-234/T3 Jacket Crown</option>
									<option value="5-237 Tratamiento de Conductos">5-237 Tratamiento de Conductos</option>
									<option value="5-237/2 Pulpotomía">5-237/2 Pulpotomía</option>
									<option value="5-237/A Apicectomía">5-237/A Apicectomía</option>
									<option value="5-238/3 Curetaje y Raspaje (Por Cuadrante)">5-238/3 Curetaje y Raspaje ( Por Cuadrante)</option>
									<option value="5-238/4 Gingivectomía">5-238/4 Gingivectomía</option>
									<option value="5-238/5 Gingivoplastía">5-238/5 Gingivoplastía</option>
									<option value="5-238/ Frenilectomía">5-238/ Frenilectomía</option>
									<option value="5-238/ Cirugía Mucogingival">5-238/ Cirugía Mucogingival</option>
									<option value="5-247 Guardas Oclusales">5-247 Guardas Oclusales</option>
									<option value="5-249 Prostodoncia Total">5-249 Prostodoncia Total</option>
									<option value="9-301 Prótesis Removible">9-301 Prótesis Removible</option>
									
							</select></td>
							<td>&nbsp;&nbsp;&nbsp;*Fecha:</td>
							<td><input type="date" name="FechaTratam"></td>
						</tr>

						<tr>
							<td class="Separador"></td>
						</tr>

						<tr>
							<td colspan="4" align="center"><input type="submit" value="Guardar" ></td>
						</tr>
					</table>

				</form-->	

				<br>

				<h4>Historial clinico dental</h4>
				<table  border="0" align="center" width="100%">
					<tr>
						<td>Diagnostico</td>
						<td>Fecha</td>
						<td>Tratamiento</td>
						<td>Fecha</td>
					</tr>
					@foreach($odontogramas as $odontograma)

					<tr>
						<td> {{ $odontograma->Diagnostico }} </td>						
						<td> {{ $odontograma->Fecha_Diagnostico }} </td>						
						<td> {{ $odontograma->Tratamiento }} </td>						
						<td> {{ $odontograma->Fecha_Tratamiento }} </td>
					</tr>
					@endforeach

				</table>
			
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





