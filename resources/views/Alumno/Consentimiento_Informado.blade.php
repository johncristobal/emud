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
							<li><a href="{{url::asset('/')}}index.php/Alumno" class="button special">Menú</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
				<h3>CONSENTIMIENTO INFORMADO</h3>

				@if(count($errors))
                        <h5 style="color: #FAF834;">Favor de llenar los campos marcados con *</h5>
                    @endif
				
				<form method="POST" action="{{url::asset('/')}}pdfConsent">


					<table align="center" class="default" border="0">
						<tr>
							<td colspan="4"> <p>A través del presente, declaro y manifiesto, en pleno uso de mis facultades mentales que sido informado/a y comprendo la necesidad y fines de ser atendido/a para restaurar total o parcialmente según las necesidades.
				</br>
				He sido informado/a de las alternativas posibles del tratamiento, al igual comprendo la necesidad de realizar, si es preciso, tratamientos remitidos con alguna interconsulta, tanto de carácter médico y quirúrgicos, incluyendo el uso de anestesia local y/o General; siempre que el tratamiento lo amerite y bajo la atención del responsable y mínimo un asistente.</br>
				Comprendo los posibles riesgos y complicaciones explicados con anterioridad, involucradas en los tratamientos y comprendo también que no es una ciencia exacta, por lo que no existen garantías sobre el resultado exacto de los tratamientos proyectados. Además de esta información que he recibido, será informado/a en cada momento y a mi requerimiento de la evolución de mi proceso de  cada uno de los tratamientos, de manera verbal y/o escrita.
				</br>
				Si surgiese cualquier situación inesperada o sobrevenida durante la intervención o tratamiento, autorizo al responsable a realizar cualquier procedimiento o maniobra distinta de las proyectadas o usuales que a su juicio estimase oportuna para la resolución teniendo siempre una justificación.
				</br> 
				Me ha sido explicado/a que para la realización del tratamiento es imprescindible mi colaboración, siendo así que su omisión puede provocar resultados distintos a los esperados en la o las rehabilitaciones.
				</br>
				Doy mi consentimiento y por ende al equipo de ayudantes que se designe según el tratamiento lo requiera.</p>
				</br></td>
						</tr>
				
				
					<tr>
						<td><label>*Paciente: </label></td>
						<td><input type="text" name="paciente"></td>
						<td><label>*Profesional de la Salud: </label></td>
						<td><input type="text" name="doctor"></td>
					</tr>

					<tr>	
						<td><label>*Testigo: </label></td>
						<td><input type="text" name="testigo1"></td>
						<td><label>*Testigo: </label></td>
						<td><input type="text" name="testigo2"></td>
					</tr>

					<tr>
						<td class="Separador" colspan="4"></td>
					</tr>

					<tr>
						<td colspan="4"><input type="Submit" value="Generar Carta"></td>

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

