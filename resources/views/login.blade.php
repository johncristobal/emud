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
                <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="index">
            <div id="page-wrapper">

            <!-- Header -->
                    <header id="header" class="alt">
                        <h1 id="logo"><a href="{{URL::asset('/')}}">EEMUD <span>by CAROLVE SYSTEMS</span></a></h1>
                        <nav id="nav">
                            <ul>
                                <!--li class="current"><a href="{{URL::asset('/')}}">Bienvenido</a></li-->
                                <!--li class="submenu">
                                        <a href="#">Ayuda</a>
                                        <ul>
                                                <li><a href="left-sidebar.html">Preguntas Frecuentes</a></li>
                                                <li><a href="contact.html">Contacto</a></li>
                                                <li class="submenu">
                                        </ul-->
                                <li><a href="#" class="button special">FAQ's</a></li>
                                <li><a href="#" class="button special">Contacto</a></li>
                                <li><a href="{{URL::asset('/')}}" class="button special">Inicio</a></li>
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
                                    <div class="inner">
                                            <h2>Log-In</h2>
                                            <h3>Ingresa tus datos</h3>

                                            @if($error = $errors->first('pass'))
                                                <h5 style="color: #FAF834;">{{$error}}</h5>
                                            @endif
                                            <form method="post" action="{{URL::asset('/')}}Usuarios/loginuser">
                                            <table border="0" class="default" align="center">
                                            <tr>
                                                <td><input type="email" name="correo" placeholder=" Ingresa correo"></td>
                                            </tr>
                                            <tr>
                                                <td class="Separador"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="password" name="contrasena" placeholder=" Ingresa contraseña"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="Separador"></td>
                                            </tr>
                                            <tr>                                            
                                                <td><input type="submit" value="Ingresar"></td>
                                            </tr>  
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