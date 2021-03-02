<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
</head>
<body>
<h1>Editar empleado</h1>
<!-- Mandando datos con instrucciones blade -->
<!-- Para actualizar hay nque encriptar los datos -->
    <form method="post" action="{{ url('/empleados/' . $e->id ) }}" enctype="multipart/form-data">
        
        <!-- Llave que dejara entrar al metodo de laravel, crea un token -->
        {{ csrf_field() }}

        <!-- Mandamos el tipo de request al controlador -->
        {{ method_field('PATCH') }}

        <label for="nombre">{{ 'Nombre' }}</label>
        <input type="text" name="nombre" id="nombre" value="{{ $e->nombre }}">
        <br>

        <label for="apellido">{{ 'Apellido' }}</label>
        <input type="text" name="apellido" id="apellido" value="{{ $e->apellido }}">
        <br>

        <label for="correo">{{ 'Correo' }}</label>
        <input type="email" name="correo" id="correo" value="{{ $e->correo }}">
        <br>

        <label for="foto">{{ 'Foto' }}</label>
        <img src="{{ asset('storage') . '/' . $e->foto }}" alt="" width="150">
        <br>
        <input type="file" name="foto" id="foto" value="{{ $e->foto }}">
        <br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>