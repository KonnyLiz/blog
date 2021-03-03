@extends('layouts.app')

@section('content')
<div class="container">
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

    <a href="{{ url('empleados/') }}">Regresar</a>
</div>
@endsection