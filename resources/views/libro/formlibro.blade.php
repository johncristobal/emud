<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear un libro</title>
</head>
<body>
	<h1>Crear un libro</h1>
	@if(count($errors) > 0)
		<div class="errors">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif
	<form action="/libros/crear" method="post">
		Nombre: <input type="text" name="nombre" value="{{old('nombre')}}">
		<br>
		Autor: <input type="text" name="autor" value="{{old('autor')}}">
		<br>
		<input type="submit" value="Crear">
	</form>
</body>
</html>