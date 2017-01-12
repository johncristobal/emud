<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
                <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
                
                <script type="text/javascript">
                    
                    function actualizar(id){
                        var c = confirm('Actualizar '+ id);
                        
                    }
                    
                    function eliminar(id){
                        var c = confirm('¿Desea eliminar este expediente? ');
                        if(c){
                            $.ajax({
                                type:'POST',
                                url:'{{URL::asset('/')}}Expediente/remove/'+id,
                                data:{'id':id},
                                success:function(data){
                                    alert('Expediente '+data+' eliminado del sistema.');
                                    location.reload();
                                }
                            },10000);
                        }
                    }
                    
                </script>
	</head>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
                        <?php
                            echo $head;
                        ?>

                <!-- Banner -->
                <section id="banner">
                <section id="principal">
                <h3>Busqueda de expediente</h3>
				
		<form method="" action="">
		<table class="table">
                    <thead>
                    <th><h3>Folio&nbsp;&nbsp;&nbsp;</h3></th>
                    <th><h3>Paciente&nbsp;&nbsp;&nbsp;</h3></th>
                    <th><h3>Fecha&nbsp;&nbsp;&nbsp;</h3></th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $value) 
                        <tr>  
                            <td>{{ $value->folio_expediente }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>{{ $value->nombre_paciente }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>{{ $value->fecha_inicio }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><img src="{{URL::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Editar" onclick="actualizar({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><img src="{{URL::asset('/')}}imagenes/ic_delete_white_24dp_2x.png" alt="Eliminar" onclick="eliminar({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    @endforeach
                    <!--tr>
                        <td colspan="3" align="center"><input type="submit" value="Buscar"></td>
                    </tr-->
                    </tbody>
		</table>
        	</form>
		</section>
                </section>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-bar-chart-o"></span>
						<h2><strong>EEMUD</strong>  Es un sistema diseñado para 
						<br />
						para la gestión de un consultorio</h2>
						
					</header>

					<!-- One -->
						
					<!-- Two -->
						

					<!-- Three -->
						

				</article>

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