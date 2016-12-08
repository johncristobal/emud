<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Producto</title>
    </head>
    <body>
        
        @if (count($errors)>0)
            Datos<br>            
            <ul>
            @foreach($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
            </ul>
        @else
            Sin datos<br>
        @endif
        
        <form method="post" action="/producto">
            
            <input type="hidden" name="P1" value="alex">
            <br>
            Nombre: <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
            <br>
            Descripcion: <input type="text" name="descrip" placeholder="Descripciòn" value="{{old('descrip')}}">
            <br>
            Precio: <input type="text" name="price" placeholder="Precio" value="{{old('price')}}">
            <br>
            <input type="submit" value="Send">
            
        </form>
    </body>
</html>
