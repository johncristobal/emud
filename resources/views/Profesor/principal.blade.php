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
		<!--<meta name="viewport" content="width=device-width, initial-scale=1" />-->
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
                <link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

                <script type="text/javascript">                
                    
                    function validarExp(){
                        //alert('Validando');
                        $.ajax({
                            type:'POST',
                            url:'{{url::asset('/')}}Profesor/Expediente/validarexp',
                            success:function(data){
                                if(data != "si"){
                                    alert("Aún no puede validar. "+data+" no validado");
                                }else{
                                    window.location.href = '{{url::asset('/')}}Profesor/Expediente/firmar';
                                }
                            }
                        },10000);
                    }
                    
                </script>

	</head>
	<body class="index">
                <div id="page-wrapper">

                    <!-- Header -->
                    <header id="header" class="alt">
                            <h1 id="logo"><a href="index.html">Bienvenido <span>
                                    @if(Session::has('nombrecom'))    
                                      {{ Session::get('nombrecom')}} 
                                    @endif
                                    </span></a></h1>
                            <nav id="nav">
                                    <ul>
                                            <li class="submenu">
                                                    <a href="#">Mi Perfil</a>
                                                    <ul>
                                                            <li><a href="left-sidebar.html">Cambiar contraseña</a></li>
                                                    </ul>
                                            </li>	


                                            <li><a href="{{url::asset('/')}}Expediente/todosProfesor" class="button">Ver expedientes</a></li>
                                            <li><a class="button" onclick="validarExp();">Validar expediente</a></li>
                                            <li><a href="{{url::asset('/')}}Usuarios/cerrarsesion" class="button special">Cerrar Sesión</a></li>
                                    </ul>
                            </nav>
                    </header>

                    <!-- Banner -->
                            <section id="banner">
                                    <!--
                                            ".inner" is set up as an inline-block so it automatically expands
                                            in both directions to fit whatever's inside it. This means it won't
                                            automatically wrap lines, so be sure to use line breaks where
                                            appropriate (<br />).
                                    -->
                                    <!--<div class="inner">

                                            <header>
                                                    <h2>Menú Principal </h2>
                                            </header>
                                            <p><strong>EEMUD</strong> es un sistema diseñado para almacenar datos de pacientes
                                            </p>

                                    </div> -->

                                    <h2>Menú Principal </h2>

                                    <div class="container">
                                        
 
					<table border ="0" align="center" class="default">
			<tr>
				<td><a href="{{url::asset('/')}}Profesor/Expediente/FichaExp"><img src="{{url::asset('/')}}imagenes/b7.png" heigth="50" width="300"></a></td>
				<td><a href="{{url::asset('/')}}Profesor/Expediente/FamHeder"><img src="{{url::asset('/')}}imagenes/b8.png" heigth="50" width="300"></a></td>
				<td><a href="{{url::asset('/')}}Profesor/Expediente/AntescPat"><img src="{{url::asset('/')}}imagenes/b2.png" heigth="50" width="300"></a></td>
			</tr>
			<tr>
				<td><a href="{{url::asset('/')}}Profesor/Expediente/AntescNoPat"><img src="{{url::asset('/')}}imagenes/b1.png" heigth="50" width="300"></a></td>

				<td><a href="{{url::asset('/')}}Profesor/Expediente/Aparatos"><img src="{{url::asset('/')}}imagenes/b3.png" heigth="50" width="300"></a></td>

				<td><a href="{{url::asset('/')}}Profesor/Expediente/Mujeres"><img src="{{url::asset('/')}}imagenes/b10.png" heigth="50" width="300"></a></td>
			</tr>
				
			<tr>		
				<td><a href="{{url::asset('/')}}Profesor/Expediente/ExplFisica"><img src="{{url::asset('/')}}imagenes/b6.png" heigth="50" width="300"></a></td>
				<td><a href="{{url::asset('/')}}Profesor/Expediente/HigOral"><img src="{{url::asset('/')}}imagenes/b9.png" heigth="50" width="300"></a></td>
				<td><a href="{{url::asset('/')}}Profesor/Expediente/Diagnostico"><img src="{{url::asset('/')}}imagenes/b13.png" heigth="50" width="300"></a></td>
				<!--td style="display:none;"><a href="{{url::asset('/')}}Expediente/Receta"><img src="{{url::asset('/')}}imagenes/b12.png" heigth="50" width="300"></a></td-->
			</tr>

			<!--tr>
				<td style="display:none;"><a href="{{URL::asset('/')}}Expediente/Consentimiento"><img src="{{url::asset('/')}}imagenes/b4.png" heigth="50" width="300"></a></td>
				<td><a href="{{URL::asset('/')}}Profesor/Expediente/Diagnostico"><img src="{{url::asset('/')}}imagenes/b13.png" heigth="50" width="300"></a></td>
                                <td style="display:none;"><a href="{{URL::asset('/')}}Expediente/Nota"><img src="{{url::asset('/')}}imagenes/b11.png" heigth="50" width="300"></a></td>
			</tr-->
		</table>

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