<!DOCTYPE HTML>
<html>
	<head>
		<title>EEMUD</title>
		<meta charset="utf-8" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/main.css" /> 
		<link rel="stylesheet" href="{{url::asset('/')}}assets/css/inputsStyle.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
                <script type="text/javascript">
                
                function updateresultado(valor1,valor2,inputval){

                    var a = document.getElementById(valor1); 
                    var strUser = a.options[a.selectedIndex].value;
                    //alert(strUser);
                    var b = document.getElementById(valor2);                    
                    var strUserb = b.options[b.selectedIndex].value;
                    //alert(strUserb);
                    var cad = (parseInt(strUser)+parseInt(strUserb))/2.0;
                    //alert(cad);
                    document.getElementById(inputval).value = cad;
                }
                    
                function validar(){
                        var a = confirm('¿Desea validar '+arguments[0]+'?');
                        var saved = arguments[0];
                        var observa = document.getElementById("observaprofesor").value;
                        if(a){
                            //get id expediente y set status from direccion in 5
                            $.ajax({
                                type:'POST',
                                url:'{{url::asset('/')}}Profesor/Expediente/validar',
                                data:{'tipo':arguments[1],'obs':observa},
                                success:function(data){
                                    alert(saved+' validado');
                                    window.location.href = '{{url::asset('/')}}Profesor/Expediente/principal';
                               }
                            },10000);
                        }
                    }
                    
                    function inputs(){                    
                        //get status from expediente...if equals to terminated, then block all the inputs
                        $.ajax({
                            type:'POST',
                            url:'{{url::asset('/')}}Expediente/validarStatus',
                            data:{'tipo':'bucal'},
                            success:function(data){
                                if(data == 5){
                                    //alert(data);
                                    $('#foasr *').attr('readonly','readonly');
                                    $('#foasr *').attr('disabled','disabled');                                    
                                }
                            }
                        },10000);
                    }
                    
                function blockall(){
                    $('#form1 input').attr('readonly','readonly');
                    $('#form1 textarea').attr('readonly','readonly');
                    $('#form1 select').attr('disabled','disabled');
                }

                </script>
	</head>
        <body class="index" onload="blockall(); inputs();">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					
					<nav id="nav">
						<ul>
							<li><a href="{{url::asset('/')}}Profesor/Expediente/HigOral/Odontograma" class="button">Odontograma</a></li>
							<li><a href="{{url::asset('/')}}Profesor" class="button special">Menú</a></li>
							
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<!--Se edita desde esta zona-->
					<h3>Datos bucales del paciente</h3>
			</br>	
                        <form method="post" action="{{url::asset('/')}}Expediente/Alta/Bucal" id="form1">   
                            <fieldset>
				<table align="center" border="0" class="default">
				<tr>
                                    <td colspan="4">Fecha Inicial: <input type="date" name="fechainicial" value="{{ $fecha1 }}"></td>
				</tr>
				<tr>
					<td class="Separador" colspan="4"></td>
				</tr>
				<tr>
					<td><legend><center>O.D.</legend>
					<td><legend>I.R.</legend>	
					<td><legend>I.C.</legend>
					<td><legend>Resultado</legend></td>
				</tr>
                                    <?php
                                        $arreglo = ['vestibular11','vestibular31','vestibular16','vestibular26','lingual36','lingual46'];
                                        $arreglonames = ['Vestibular 11','Vestibular 31','Vestibular 16','Vestibular 26','Lingual 36','Lingual 46'];

                                        $i = -1;
                                        foreach ($arreglonames as $value) {
                                            
                                            $i += 1;
                                    ?>
        				<tr>
                                            <td><?=$value;?></td>
                                    <?php
                                            if($valores[$arreglo[$i]."1"] == 0){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0" selected="true">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            } else if($valores[$arreglo[$i]."1"] == 1){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1" selected="true">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($valores[$arreglo[$i]."1"] == 2){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2" selected="true">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($valores[$arreglo[$i]."1"] == 3){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3" selected="true">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }
                                            //chec the another 
                                            if($valores[$arreglo[$i]."2"] == 0){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0" selected="true">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            } else if($valores[$arreglo[$i]."2"] == 1){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1" selected="true">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($valores[$arreglo[$i]."2"] == 2){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2" selected="true">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($valores[$arreglo[$i]."2"] == 3){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3" selected="true">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }
                                    ?>
                                                <td><label></label><input type="text" class="form" name="<?=$arreglo[$i]."3";?>" id="<?=$arreglo[$i]."3";?>" value="<?php echo (($valores[$arreglo[$i]."2"])+($valores[$arreglo[$i]."1"]))/2; ?>"></td>	
                                            </tr>

                                    <?php
                                        }
                                    ?>
					<!--td>
                                            <select class="form">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><label></label><input type="text" class="form"></td>	
				</tr>

				<tr>
					<td>Vestibular 31</td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><label></label><input type="text" class="form"></td>	
				</tr>

				<tr>
					<td>Vestibular 16</td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><label></label><input type="text" class="form"></td>	
				</tr>

				<tr>
					<td>Vestibular 26</td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><label></label><input type="text" class="form"></td>	
				</tr>

				<tr>
					<td>Lingual 36</td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><label></label><input type="text" class="form"></td>	
				</tr>

				<tr>
					<td>Lingual 46</td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><select class="form">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select></td>
					<td><label></label><input type="text" class="form"></td>	
				</tr>
				<tr>
					<td class="Separador" colspan="4"></td>
				</tr>
				<tr>
					<td colspan="4"><input type="submit" value="guardar datos"></td>
				</tr-->
			</table>
		</fieldset>
	</br>
		
		<fieldset>
			
				<table align="center" border="0" class="default">
					<tr>
                                            <td colspan="4">Fecha Final: <input type="date" name="fechafin" value="{{ $fecha2 }}"></td>
					</tr>	

					<tr>
					<td class="Separador" colspan="4"></td>
				</tr>


					<tr>
						<td><legend><center>O.D.</legend>
						<td><legend>I.R.</legend>	
						<td><legend>I.C.</legend>
						<td><legend>Resultado</legend></td>
					</tr>
                                        <?php
                                        $arreglo = ['vestibularfin11','vestibularfin31','vestibularfin16','vestibularfin26','lingualfin36','lingualfin46'];
                                        $arreglonames = ['Vestibular 11','Vestibular 31','Vestibular 16','Vestibular 26','Lingual 36','Lingual 46'];

                                        $i = -1;
                                        foreach ($arreglonames as $value) {
                                            
                                            $i += 1;
                                    ?>
        				<tr>
                                            <td><?=$value;?></td>
                                    <?php
                                            if($finales[$arreglo[$i]."1"] == 0){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0" selected="true">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            } else if($finales[$arreglo[$i]."1"] == 1){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1" selected="true">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($finales[$arreglo[$i]."1"] == 2){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2" selected="true">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($finales[$arreglo[$i]."1"] == 3){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."1";?>" id="<?=$arreglo[$i]."1";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3" selected="true">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }
                                            //chec the another 
                                            if($finales[$arreglo[$i]."2"] == 0){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0" selected="true">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            } else if($finales[$arreglo[$i]."2"] == 1){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1" selected="true">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($finales[$arreglo[$i]."2"] == 2){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2" selected="true">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }else if($finales[$arreglo[$i]."2"] == 3){
                                    ?>
                                                <td>
                                                    <select class="form" name="<?=$arreglo[$i]."2";?>" id="<?=$arreglo[$i]."2";?>" onchange="updateresultado(<?php echo "'".$arreglo[$i]."1"."'";?>,<?php echo "'".$arreglo[$i]."2"."'";?>,<?php echo "'".$arreglo[$i]."3"."'";?>);">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3" selected="true">3</option>
                                                </select>
                                                </td>
                                    <?php
                                            }
                                    ?>
                                                <td><label></label><input type="text" class="form" name="<?=$arreglo[$i]."3";?>" id="<?=$arreglo[$i]."3";?>" value="<?php echo (($finales[$arreglo[$i]."2"])+($finales[$arreglo[$i]."1"]))/2; ?>"></td>	
                                            </tr>

                                    <?php
                                        }
                                    ?>
					<!--tr>
						<td>Vestibular 11</td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><label></label><input type="text" class="form"></td>	
					</tr>

					<tr>
						<td>Vestibular 31</td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><label></label><input type="text" class="form"></td>	
					</tr>

					<tr>
						<td>Vestibular 16</td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><label></label><input type="text" class="form"></td>	
					</tr>

					<tr>
						<td>Vestibular 26</td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><label></label><input type="text" class="form"></td>	
					</tr>

					<tr>
						<td>Lingual 36</td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><label></label><input type="text" class="form"></td>	
					</tr>

					<tr>
						<td>Lingual 46</td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><select class="form">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select></td>
						<td><label></label><input type="text" class="form"></td>	
					</tr>

					<tr>
					<td class="Separador" colspan="4"></td>
				</tr-->

				</table>
			</fieldset>
		</br>

		<fieldset>
			<h3>INDICE CPOD</h3>
				<table align="center" border="0" class="default">
				<tr>
					<td>O.D</td>
					<td>Inicial</td>
					<td>Final</td>
					<!--td>Observaciones</td-->
				</tr>	
				
				<tr>
					<td>Cariados</td>
					<td>
                                            {!! Form::select('cpod1',[
                                                '0' => '0',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                '11' => '11',
                                                '12' => '12',
                                                '13' => '13',
                                                '14' => '14',
                                                '15' => '15',
                                                '16' => '16',
                                                '17' => '17',
                                                '18' => '18',
                                                '19' => '19',
                                                '20' => '20',
                                                '21' => '21',
                                                '22' => '22',
                                                '23' => '23',
                                                '24' => '24',
                                                '25' => '25',
                                                '26' => '26',
                                                '27' => '27',
                                                '28' => '28',
                                                '29' => '29',
                                                '30' => '30',
                                                '31' => '31',
                                                '32' => '32'
                                            ],$cpod1)
                                            !!}                                            
                                            <!--select name="num3">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
								</select-->
                                        </td>
					<td>
                                            {!! Form::select('cpod2',[
                                                '0' => '0',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                '11' => '11',
                                                '12' => '12',
                                                '13' => '13',
                                                '14' => '14',
                                                '15' => '15',
                                                '16' => '16',
                                                '17' => '17',
                                                '18' => '18',
                                                '19' => '19',
                                                '20' => '20',
                                                '21' => '21',
                                                '22' => '22',
                                                '23' => '23',
                                                '24' => '24',
                                                '25' => '25',
                                                '26' => '26',
                                                '27' => '27',
                                                '28' => '28',
                                                '29' => '29',
                                                '30' => '30',
                                                '31' => '31',
                                                '32' => '32'
                                            ],$cpod2)
                                            !!} 
                                            <!--select class="form">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
								</select-->
                                        </td>			
						<td></td>
				</tr>

				<tr>
					<td>Perdidos</td>
					<td>
                                            {!! Form::select('cpod3',[
                                                '0' => '0',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                '11' => '11',
                                                '12' => '12',
                                                '13' => '13',
                                                '14' => '14',
                                                '15' => '15',
                                                '16' => '16',
                                                '17' => '17',
                                                '18' => '18',
                                                '19' => '19',
                                                '20' => '20',
                                                '21' => '21',
                                                '22' => '22',
                                                '23' => '23',
                                                '24' => '24',
                                                '25' => '25',
                                                '26' => '26',
                                                '27' => '27',
                                                '28' => '28',
                                                '29' => '29',
                                                '30' => '30',
                                                '31' => '31',
                                                '32' => '32'
                                            ],$cpod3)
                                            !!} 
                                            <!--select class="form">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
								</select-->
                                        </td>
					<td>
                                            {!! Form::select('cpod4',[
                                                '0' => '0',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                '11' => '11',
                                                '12' => '12',
                                                '13' => '13',
                                                '14' => '14',
                                                '15' => '15',
                                                '16' => '16',
                                                '17' => '17',
                                                '18' => '18',
                                                '19' => '19',
                                                '20' => '20',
                                                '21' => '21',
                                                '22' => '22',
                                                '23' => '23',
                                                '24' => '24',
                                                '25' => '25',
                                                '26' => '26',
                                                '27' => '27',
                                                '28' => '28',
                                                '29' => '29',
                                                '30' => '30',
                                                '31' => '31',
                                                '32' => '32'
                                            ],$cpod4)
                                            !!} 
                                            <!--select class="form">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
								</select-->
                                        </td>			
						<td></td>
				</tr>

				<tr>
					<td>Obturados</td>
					<td>
                                            {!! Form::select('cpod5',[
                                                '0' => '0',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                '11' => '11',
                                                '12' => '12',
                                                '13' => '13',
                                                '14' => '14',
                                                '15' => '15',
                                                '16' => '16',
                                                '17' => '17',
                                                '18' => '18',
                                                '19' => '19',
                                                '20' => '20',
                                                '21' => '21',
                                                '22' => '22',
                                                '23' => '23',
                                                '24' => '24',
                                                '25' => '25',
                                                '26' => '26',
                                                '27' => '27',
                                                '28' => '28',
                                                '29' => '29',
                                                '30' => '30',
                                                '31' => '31',
                                                '32' => '32'
                                            ],$cpod5)
                                            !!} 
                                            <!--select class="form">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
								</select-->
                                        </td>
					<td>
                                            {!! Form::select('cpod6',[
                                                '0' => '0',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4',
                                                '5' => '5',
                                                '6' => '6',
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                                '10' => '10',
                                                '11' => '11',
                                                '12' => '12',
                                                '13' => '13',
                                                '14' => '14',
                                                '15' => '15',
                                                '16' => '16',
                                                '17' => '17',
                                                '18' => '18',
                                                '19' => '19',
                                                '20' => '20',
                                                '21' => '21',
                                                '22' => '22',
                                                '23' => '23',
                                                '24' => '24',
                                                '25' => '25',
                                                '26' => '26',
                                                '27' => '27',
                                                '28' => '28',
                                                '29' => '29',
                                                '30' => '30',
                                                '31' => '31',
                                                '32' => '32'
                                            ],$cpod6)
                                            !!} 
                                            <!--select class="form">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
									<option>32</option>
								</select-->
                                        </td>			
						<td></td>
				</tr>
				<tr>
					<td class="Separador" colspan="4"></td>
				</tr>

				<tr>
					<td>Total de dientes:</td>
                                        <td colspan="2"><input type="text" name="dientes" value="{{ $total }}"></td>
				</tr>	
				<tr>
					<td class="Separador" colspan="4"></td>
				</tr>
                                
                                <tr>
                                    <td><label>Observaciones</label></td>
                                    <td colspan="2"><textarea rows="3" cols="40" class="form" name="observaciones">{{ $observaciones }}</textarea></td>
				</tr>
				<tr>
					<td colspan="2"></br></td>
				</tr>
                                </table>
                            </fieldset>
                        </form>
                        <fieldset>
                            
                            <form method="post" action="{{url::asset('/')}}Profesor/Expediente/Alta/HigOral" id="foasr"> 
                            <table>

                                <tr>

                                    <td><label>Observaciones <br>profesor:</label></td>
                                    <td colspan="2"><textarea class="tam" id="observaprofesor" name="observaprofesor" rows="6" cols="3" style="background: rgba(100, 100, 100, 0.8)">{{$observaprofe}}</textarea>
                                </tr>
                                <tr>
					<td colspan="2"></br></td>
				</tr>

				<tr>
                                    <td colspan="2"></td>
					<td>
                                            <input type="submit" value="Guardar observaciones">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="button" value="Validar sección" align="center" onclick="validar('Higiene bucal','bucal');">
                                        </td>
				</tr>
                            </table>
                            </form>
                </fieldset>
                        
	<!-- ODONTOGRAMA -->
		<!--div id="Odontograma">
	  		<div>
				<fieldset>
				<h3>ODONTOGRAMA</h3>
	                    <Center><img src="{{url::asset('/')}}Imagenes/odontograma.png" width="700" height="500" alt=""/></Center>
				</fieldset>
			</div>
		</div-->	
			
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
            <?php
                echo $scrip;
            ?>

	</body>
</html>





