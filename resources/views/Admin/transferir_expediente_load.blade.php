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
					<h3>Transferir expediente</h3>
				

		<form method="post" action="{{URL::asset('/')}}Usuarios/Transferir/Save">
		<table class="form" border="0">
			<tr><td colspan="3">Seleccionar alumno que tiene el expediente</td></tr>
			<tr>
				<td>Seleccionar alumno:</td>
                                <td>
                                   
                                <select id="estudianteA" name="estudianteA" onchange="verexpedientes();">
                                    <option value="ninguno">Seleccionar</option>
                                    @foreach($alumnos as $value)
                                        @if($value->id == $alumno_elegido)
                                            <option value="{{$value->id}}" selected="true">{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                </td>
				<td></td>										
			</tr>

			<tr>
				<td class="Separador" colspan="3"></td>
			</tr>
			
			<!--tr><td colspan="2">Seleccionar alumno a quien se tranfiere el expediente</td></tr>
			<tr>
				<td>Seleccionar alumno:</td><td><select><option>xs</option>
			</tr>
			<tr>
				<td class="Separador" colspan="3"></td>
			</tr>

			<tr><td colspan="3" align="center"><input type="submit" value="Reasignar"></td></tr-->
		</table>
                    
                <table width="100%" id="tabledata">
                    <thead>
                    <th width="50%"><h3>Expediente</h3></th>
                    <th width="50%"><h3>Transferir a</h3></th>
                    </thead>
                    <tbody id="cuerpotabla">
                        <?php
                        $i = 0;
                        foreach ($expedientes as $value) {
                        ?>
                        <tr>
                            <td><?php echo $value->folio_expediente;?></td>
                            <td>
                                <select name="nuevo<?php echo $i;?>">
                                    <option value="ninguno">Seleccionar</option>
                                    @foreach($alumnos as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <?php
                        $i += 1;
                        }
                        ?>
                    </tbody>
                </table>

                <table class="form" border="0">
                    <tr><td colspan="3"><input type="submit" value="Guardar"></td></tr>
                </table>
                    
                <!--table class="form" border="0">
                    <tr><td colspan="3"><input type="submit" value="Guardar"></td></tr>
                </table-->
    
                    
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
            <?php
                echo $scrip;
            ?>

            <script type="text/javascript">
                function verexpedientes(){
                    
                    //before this we have to get all the names of alumnos to know where asign...
                    //create string with select option>names /select                  
                    
                    //use the cadenas before to select new user and save it
                    var idd = document.getElementById("estudianteA").value;
                    //var table = document.getElementById("cuerpotabla");
                    //var i = 0;
                    //erase table...
                    //table.innerHTML = '';
                    //id => id from user table usuarios
                    //get expedientes from usuario with id and show in table
                    
                    $.ajax({
                        type:'post',
                        url:'{{URL::asset('/')}}Expediente/saveIdAlumno/',
                        data:{'id':idd},
                        success:function(data){
                            
                            window.location.href = '{{URL::asset('/')}}Usuarios/getAlumnos';

                            //alert(data);
                            /*$.each(data, function(index) {
                                var cadenas = "";

                                $.ajax({
                                    type:'post',
                                    url:'{{URL::asset('/')}}Usuarios/getAlumnos/',
                                    //data:{'id':idd},
                                    success:function(dataAl){
                                        //alert(data);
                                        cadenas += "<select name='alumnonuevo"+i+"'>";
                                        i += 1;
                                        $.each(dataAl, function(index) {
                                            //alert(data[index].folio_expediente);
                                            //alert(data[index].matricula);
                                            cadenas += "<option value='"+dataAl[index].id+"'>"+dataAl[index].name+"</option>";
                                        });
                                        cadenas += "</select>";
                                        var row = table.insertRow(-1);
                                        var cell1 = row.insertCell(0);
                                        var cell2 = row.insertCell(1);
                                        //var cell3 = row.insertCell(2);
                                        cell1.innerHTML = data[index].folio_expediente;
                                        cell2.innerHTML = cadenas;
                                    }
                                });                                
                            });*/
                        }
                    });
                }               
                </script>                 
	</body>
</html>
