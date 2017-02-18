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
		<!--<meta name="viewport" content="width=device-width, initial-scale=1" />-->
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
                <link rel="stylesheet" href="{{URL::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
                <script type="text/javascript">
                    
                    function verexpediente(id){
                        //alert(id);
                        $.ajax({
                            type:'POST',
                            url:'{{URL::asset('/')}}Expediente/verprincipal/'+id,
                            data:{'id':id},
                            success:function(data){
                                //alert(data);
                                //alert('Expediente '+data+' eliminado del sistema.');
                                window.location.href = '{{URL::asset('/')}}Expediente/principal';
                            }
                        },10000);
                    }
                    
                </script>
                    
	</head>
	<body class="index">
                <div id="page-wrapper">

                    <!-- Header -->
                    <header id="header" class="alt">
                        <h1 id="logo"><a href="index.html">Bienvenido <span>Nombre</span></a></h1>
                        <nav id="nav">
                                <ul>
                                        <li class="submenu">
                                                <a href="#">Mi Perfil</a>
                                                <ul>
                                                        <li><a href="left-sidebar.html">Editar mi perfil</a></li>
                                                        <li><a href="contact.html">Cambiar mi imagen</a></li>
                                                        <li><a href="contact.html">Cambiar contraseña</a></li>
                                        <li class="submenu">
                                                </ul>

            

                                        <li><a href="./index.html" class="button special">Cerrar Sesión</a></li>
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

                                    <h2>Seleccione uno de sus expedientes</h2>

                                    <form method="" action="">
                    <br>
                    <table class="table" id="buscador">
                    <thead>
                    <th width="20%"><h3>Folio&nbsp;&nbsp;&nbsp;</h3></th>
                    <th width="50%"><h3>Paciente&nbsp;&nbsp;&nbsp;</h3></th>
                    <th width="30%"><h3>Fecha&nbsp;&nbsp;&nbsp;</h3></th>
                    <!--th width="5%"></th-->
                    <th width="10%"></th>
                   
                    </thead>
                    <tbody>
                    @foreach ($data as $value) 
                        <tr>  
                            <td>{{ $value->folio_expediente }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>{{ $value->nombre_paciente }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>{{ $value->fecha_inicio }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <!--td><img src="{{URL::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Editar" onclick="actualizar({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td-->
                            <td><img src="{{URL::asset('/')}}imagenes/ic_settings_white_24dp/web/ic_settings_white_24dp_1x.png" alt="Editar" onclick="verexpediente({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    @endforeach
                    <!--tr>
                        <td colspan="3" align="center"><input type="submit" value="Buscar"></td>
                    </tr-->
                    </tbody>
		</table>
        	</form>
                                    



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
                    <script src="{{URL::asset('/')}}assets/js/jquery.min.js"></script>
                    <script src="{{URL::asset('/')}}assets/js/jquery.dropotron.min.js"></script>
                    <script src="{{URL::asset('/')}}assets/js/jquery.scrolly.min.js"></script>
                    <script src="{{URL::asset('/')}}assets/js/jquery.scrollgress.min.js"></script>
                    <script src="{{URL::asset('/')}}assets/js/skel.min.js"></script>
                    <script src="{{URL::asset('/')}}assets/js/util.js"></script>
                    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
                    <script src="{{URL::asset('/')}}assets/js/main.js"></script>

	</body>
</html>