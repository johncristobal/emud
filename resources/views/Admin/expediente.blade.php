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
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body class="index">
    <div id="page-wrapper">

    <!-- Header -->
    <?php
        echo $head;
    ?>

    <!-- Banner -->
    <section id="banner">
        <h3>Dar de alta nuevo expediente</h3>

        <div class="container">
        @if(count($errors))
        <h5 style="color: #FAF834;">Favor de llenar los campos marcados con *</h5>
        @endif

            <form method="post" action="{{url::asset('/')}}Expediente/Alta">
                <table class="table" align="center" width="100%">
                    <thead>
                    <th width="25%"></th>
                    <th width="25%"></th>
                    <th width="25%"></th>
                    <th width="25%"></th>
                    </thead>
                <tbody>
            <tr>
                <td>*Nombre</td>
                <td>
                    <input type="text" name="nombre" size="50"/>
                </td>
            </tr>
            <tr>
                <td class="Separador" colspan="3"></td>
            </tr>
            <tr>
                <td>*Apellido paterno</td>
                <td>
                    <input type="text" name="paterno" size="50">
                </td>
            </tr>
            <tr>
                <td class="Separador" colspan="3"></td>
            </tr>
            <tr>
                <td>*Apellido materno</td>
                <td>
                    <input type="text" name="materno" size="50">
                </td>
            </tr>
            <tr>
                <td class="Separador" colspan="3"></td>
            </tr>

            <tr>
                <td>*No. Expediente</td>
                <td>
                    <input type="text" name="NoExp" value="{{$folio}}" hidden="true" readonly="true">
                </td>
            </tr>
            <tr>
                <td class="Separador" colspan="3"></td>
            </tr>

            <tr>
                <td><label>*Clinica</label></td> 
                <td>                                       
                    <select name="clinica">                                        
                        @foreach ($data as $value)                                                                                                                     
                            <option value="{{ $value->id }}"> {{ $value->nombre_clinica }}</option> 
                        @endforeach
                    </select>
                </td>
                <td>*G&eacute;nero</td>
                <td>
                    <select name="genero">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="Separador" colspan="6"></td>
            </tr>

            <tr>
                <td>*Fecha de nacimiento</td>
                <td><input type="date" name="FechaNac"></td>
                <td><label>*Fecha Inicio</label></td>
                <td><input type="date" name="fechaInicio"></td>
            </tr>

            <tr>
                <td class="Separador" colspan="6"></td>
            </tr>

            <tr>
                <td>*No de recibo de pago</td>
                <td><input type="text" name="reciboPago"></td> &nbsp;
                <td>*No recibo de diagnostico</td>
                <td><input type="text" name="reciboDiagn"></td>
            </tr>

            <tr>
            <td class="Separador" colspan="6"></td>
            </tr>

            <tr>
            <td colspan="6"><input type="submit" value="Guardar" class="button"></td>
            </tr>
            </tbody>
            </table>

            </form>
        </div>
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

</body>
</html>
