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
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
                
                <script type="text/javascript">
                
                    function vernota(id){
                        
                        //alert(id);
                        
                        window.open('{{URL::asset('/')}}'+id);
                        
                        /*$.ajax({
                            type:'POST',
                            url:'{{URL::asset('/')}}Notas/verimagen',
                            data:{'id':id},
                            success:function(data){
                                alert(data);
                                //alert('Expediente '+data+' eliminado del sistema.');
                                //window.location.href = '{{URL::asset('/')}}Notas/principal';
                            }
                        },10000);*/
                    }
                </script>

                <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
                
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


                                            <li><a href="{{url::asset('/')}}Expediente/todos" class="button">Ver expedientes</a></li>
                                            <li><a href="{{url::asset('/')}}" class="button special">Cerrar Sesión</a></li>
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

                                    <h2>Archivos del expediente</h2>

                                    <div class="container">
                                        
                                        <!--Subir archivo si asi lo desea-->
                                        <table class="table" id="buscador" width="100%">
                                            <tr>
                                                <td width="70%"></td>
                                                <td width="30%">
                                                    <!-- Trigger/Open The Modal -->
                                                    Subir archivo &nbsp;&nbsp;&nbsp;<img src="{{URL::asset('/')}}imagenes/ic_file_upload_white_24dp/web/ic_file_upload_white_24dp_2x.png" id="myBtn"></img>
                                                    <!--input type="file" name="image" value="Subir archivo" title="" style="width: 400px;">
                                                    <input type="submit" name="Subir" value="Subir" style="width: 50px;"-->
                                                </td>
                                            </tr>
                                            </tr>
                                        </table>
                            
                                        
			<table class="table" id="buscador" width="100%">
                            <thead>
                            <th width="60%"><h3>Nombre</h3></th>
                            <!--th width="5%"></th-->
                            <th width="20%">Ver</th>
                            <th width="20%">Eliminar</th>

                            </thead>
                            <tbody>
                            @foreach ($data as $value) 
                                <tr>
                                    <td>{{ $value['fecha'] }}</td>
                                    <td><img src="{{URL::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Editar" onclick="vernota('{{ $value['idnota'] }}');"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td><img src="{{URL::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Eliminar" onclick="eliminarnota({{ $value['idnota'] }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            @endforeach
                            <!--tr>
                                <td colspan="3" align="center"><input type="submit" value="Buscar"></td>
                            </tr-->
                            </tbody>
                                    </table>

                        </div>

                            </section> 

                    <!-- Main -->

                    <!-- CTA -->
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                    <form method="post" enctype="multipart/form-data" action="{{url::asset('/')}}uploadfile" accept-charset="UTF-8">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>
                        <!--p>Some text in the Modal..</p-->
                        <input type="file" name="image" value="Subir archivo" title="" style="width: 400px;">
                        <input type="submit" name="Subir" value="Subir" style="width: 50px;">

                      </div>
                    </form>

                    </div>

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

                    <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    </script>

	</body>
</html>