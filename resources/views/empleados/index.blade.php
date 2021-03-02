<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table table-light">
        <thead class="thead-ligth">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $e)
            <tr>
                <!-- loop es para mostrar el numero de iteraciones -->
                <td>{{ $loop->iteration }}</td>
                <td> {{ $e->foto }} </td>
                <td> {{ $e->nombre }} </td>
                <td> {{ $e->apellido }} </td>
                <td> {{ $e->correo }} </td>
                <td> Editar |
                    <form action="{{ url('/empleados/'.$e->id) }}" method="post">
                        <!-- Llave que dejara entrar al metodo de laravel, crea un token -->
                        {{ csrf_field() }}

                        <!-- agregamos el tipo de solicitud que haremos -->
                        {{ method_field('DELETE') }}

                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>