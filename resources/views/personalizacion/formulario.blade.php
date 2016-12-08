<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>

            body{
                font-size: {{$fuente}};
            }
            
        </style>
    </head>
    <body>
            Fuente: {{$fuente}}

            <form action="/personalizacion" method="post">
		Fuente: 
            <br/>
            
            <select name="fuente">
                <option value="24pt">Grande</option>
                <option value="16pt">Mediana</option>
                <option value="12pt">Pequeña</option>
            </select>
            
            <br />
            
            <input type="submit" value="Enviar">
            </form>
    </body>
</html>
