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
                <link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
                
                <script type="text/javascript">
                    
                    function actualizar(id){
                        var c = confirm('Actualizar '+ id);
                        
                    }
                    
                    function eliminar(id){
                        var c = confirm('¿Desea eliminar este usuario? ');
                        if(c){
                            $.ajax({
                                type:'POST',
                                url:'{{url::asset('/')}}Usuario/remove/'+id,
                                data:{'id':id},
                                success:function(data){
                                    alert('Usuario '+data+' eliminado del sistema.');
                                    location.reload();
                                }
                            },10000);
                        }
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
                        <?php
                            echo $head;
                        ?>

                <!-- Banner -->
                <section id="banner">
                <section id="principal">
                <h3>Usuarios registrados</h3>
                <input type="text" id="myInput" onkeyup="buscar()" placeholder="Buscar nombre o correo..." style="width:100%;">
				
		<form method="" action="">
                    <br>
                    <table class="table" id="buscador">
                    <thead>
                    <th width="20%"><h3>Nombre&nbsp;&nbsp;&nbsp;</h3></th>
                    <th width="50%"><h3>Correo&nbsp;&nbsp;&nbsp;</h3></th>
                    <th width="30%"><h3>Rol&nbsp;&nbsp;&nbsp;</h3></th>
                    <!--th width="5%"></th-->
                    <th width="10%"></th>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $value) 
                        <tr>  
                            <td>{{ $value->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>{{ $value->correo }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><?php if($value->rol == 1){echo "Administrador";}else if($value->rol == 2){echo "Alumno";}else if($value->rol == 3){echo "Profesor";}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <!--td><img src="{{URL::asset('/')}}imagenes/ic_settings_white_24dp_2x.png" alt="Editar" onclick="actualizar({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td-->
                            <td><img src="{{url::asset('/')}}imagenes/ic_delete_white_24dp_2x.png" alt="Eliminar" onclick="eliminar({{ $value->id }});"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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

            <?php
                echo $scrip;
            ?>

	</body>
</html>