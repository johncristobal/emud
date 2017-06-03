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
                <link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
                <script type="text/javascript">
                    
                    function verexpediente(id){
                        //alert(id);
                        $.ajax({
                            type:'POST',
                            //save id expedinete to load info from DB
                            url:'{{url::asset('/')}}Expediente/verprincipal/'+id,
                            data:{'id':id},
                            success:function(data){
                                //alert(data);
                                //alert('Expediente '+data+' eliminado del sistema.');
                                window.location.href = '{{url::asset('/')}}Profesor/Expediente/principal';
                            }
                        },10000);
                    }
                    
                    function verimagenes(id){
                        //alert(id);
                        $.ajax({
                            type:'POST',
                            url:'{{url::asset('/')}}Expediente/verprincipal/'+id,
                            data:{'id':id},
                            success:function(data){
                                //alert(data);
                                //alert('Expediente '+data+' eliminado del sistema.');
                                window.location.href = '{{url::asset('/')}}Expediente/imagenes';
                            }
                        },10000);
                    }
                    
                    function vernotas(id){
                        //alert(id);
                        $.ajax({
                            type:'POST',
                            url:'{{url::asset('/')}}Expediente/verprincipal/'+id,
                            data:{'id':id},
                            success:function(data){
                                //alert(data);
                                //alert('Expediente '+data+' eliminado del sistema.');
                                window.location.href = '{{url::asset('/')}}Profesor/Nota/notas';
                            }
                        },10000);
                    }

                    function buscar() {
                        // Declare variables 
                        var input, filter, table, tr, td, i,td2,flag;
                        flag = 0;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("buscador");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];   //get the first column
                            td2 = tr[i].getElementsByTagName("td")[1];   //get the first column
                            if (td){
                                if ((td.innerHTML.toUpperCase().indexOf(filter) > -1) || (td2.innerHTML.toUpperCase().indexOf(filter) > -1)) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }                            
                        }
                    }

                </script>
                    
	</head>
	<body class="index">
                <div id="page-wrapper">

                    <!-- Header -->
                    <header id="header" class="alt">
                        <h1 id="logo"><a href="index.html">Bienvenido 
                                <span>
                                    @if(Session::has('nombrecom'))    
                                      {{ Session::get('nombrecom')}} 
                                    @endif
                                </span>
                        </a></h1>
                        <nav id="nav">
                                <ul>
                                        <li class="submenu">
                                                <a href="#">Mi Perfil</a>
                                                <ul>
                                                        <li><a href="contact.html">Cambiar mi imagen</a></li>
                                        <li class="submenu">
                                                </ul>

            

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

                                    <h2>Seleccione uno de sus expedientes</h2>

                                    <h3>Búsqueda de expediente</h3>
                                        <table class="table" width="100%">
                                            <tr>
                                                <td width="20%"></td>
                                                <td width="60%">
                                                    
                                                <input type="text" id="myInput" onkeyup="buscar();" placeholder="Buscar folio expediente o alumno..." style="width:100%;">
                                                </td>
                                                <td width="20%"></td>
                                            </tr>
                                        </table>
                
                                    <form method="" action="">
                                        <br>
                                        <table class="table" id="buscador" width="100%">
                                        <thead>
                                        <th width="10%"><h3>Folio</h3></th>
                                        <th width="15%"><h3>Alumno</h3></th>
                                        <th width="15%"><h3>Paciente</h3></th>
                                        <th width="15%"><h3>Fecha</h3></th>
                                        <th width="10%"><h3>Estatus</h3></th>
                                        <!--th width="5%"></th-->
                                        <th width="10%">Editar</th>
                                        <!--th width="10%">Archivos</th-->
                                        <th width="10%">Notas</th>

                                        </thead>
                                        <tbody>
                                        @foreach ($data as $value) 
                                        <tr>  
                                                <td>{{ $value->folio_expediente }}</td>
                                                <td>{{ $value->name }} &nbsp; {{ $value->pat}}</td>
                                                <td>{{ $value->nombre_paciente }} &nbsp; {{ $value->ap_paterno }}</td>
                                                <td>{{ $value->fecha_inicio }}</td>                                        
                                                <td><?php if($value->status == 1){echo "Por validar";} else if($value->status == 2){echo "Inactivos";} else if($value->status == 4){echo "Revisado";} else if($value->status == 5){echo "Validado";}?></td>                     
                                                                                                <!--td><img src="{{url::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Editar" onclick="actualizar({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td-->
                                                <td><img src="{{url::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Editar" onclick="verexpediente({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <!--td><img src="{{URL::asset('/')}}imagenes/ic_image_white_24dp_2x.png" alt="Imagenes" onclick="verimagenes({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td-->
                                                <td><img src="{{url::asset('/')}}imagenes/ic_note_add_white_24dp_2x.png" alt="Notas" onclick="vernotas({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
            <?php
                echo $scrip;
            ?>

	</body>
</html>