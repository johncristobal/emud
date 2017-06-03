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
                            url:'{{url::asset('/')}}Profesor/Expediente/validar',
                            success:function(data){
                                if(data != "si"){
                                    alert("Aún no puede validar. "+data+" no validado");
                                }else{
                                    window.location.href = '{{url::asset('/')}}Profesor/Expediente/firmar';
                                }
                            }
                        },10000);
                    }
                    
                    function saveFirma(){
                        
                        var firma = document.getElementById("firma").value;
                        
                        if(firma == ""){
                            alert('Coloque una firma para continuar');
                        }else{
                            var a = confirm('Desea validar el expediente');
                            if (a){
                                $.ajax({
                                    type:'POST',
                                    url:'{{url::asset('/')}}Profesor/Expediente/savesign',
                                    data:{'firma':firma},
                                    success: function(data){
                                        alert('Reporte validado satisfactoriamente');
                                        window.location.href = '{{url::asset('/')}}Profesor/Expediente/principal';
                                    }
                                },100000);
                            }
                        }
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

                                    <h2>Validar expediente</h2>

                                    <div class="container">
                                        <!--form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/Mujeres"--> 
                                        
                                <table border="0" align="center" class="default" width="100%">
                                <tr>
                                    <td></br></td>
                                </tr>
                                <tr>
                                    <td width="20%"></td>
                                    <td width="60%">
                                        Firma para validar expediente: &nbsp;&nbsp;&nbsp;
                                        <!--a href="{{url::asset('/')}}Profesor/Expediente/FichaExp">
                                            <img src="{{url::asset('/')}}imagenes/b7.png" heigth="50" width="300">
                                        </a-->
                                        <input type="text" name="firma" id="firma" placeholder="Firma">
                                        <br/>
                                        <br/>
                                        <br/>
                                        <button class="button" onclick="saveFirma();" value="Aceptar" name="Aceptar">Aceptar</button>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td>
                                    </td>
                                </tr>
                                </table>
                    <!--/form-->
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