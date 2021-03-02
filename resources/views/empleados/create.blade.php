<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
</head>
<body>
<h1>Crear empleado</h1>
<!-- Mandando datos con instrucciones blade -->
    <form method="post" action="{{ url('/empleados') }}" enctype="multipart/form-data">
        
        <!-- Llave que dejara entrar al metodo de laravel, crea un token -->
        {{ csrf_field() }} 

        <label for="nombre">{{ 'Nombre' }}</label>
        <input type="text" name="nombre" id="nombre">
        <br>

        <label for="apellido">{{ 'Apellido' }}</label>
        <input type="text" name="apellido" id="apellido">
        <br>

        <label for="correo">{{ 'Correo' }}</label>
        <input type="email" name="correo" id="correo">
        <br>

        <label for="foto">{{ 'Foto' }}</label>
        <input type="file" name="foto" id="foto">
        <br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>