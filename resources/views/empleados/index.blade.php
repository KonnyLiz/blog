<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>

<body>
<h1>Mostrando lista de empleados</h1>

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
    @endif

    <a href="{{ url('empleados/create') }}">Nuevo</a>
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
                <td>  
                    <img src="{{ asset('storage') . '/' . $e->foto }}" alt="" width="150">
                </td>
                <td> {{ $e->nombre }} </td>
                <td> {{ $e->apellido }} </td>
                <td> {{ $e->correo }} </td>
                <td>
                    <a href="{{ url('/empleados/'. $e->id . '/edit') }}">
                        Editar
                    </a>
                    |
                    <form action="{{ url('/empleados/'.$e->id) }}" method="post">
                        <!-- Llave que dejara entrar al metodo de laravel, crea un token -->
                        {{ csrf_field() }}

                        <!-- agregamos el tipo de solicitud que haremos -->
                        {{ method_field('DELETE') }}

                        <button type="submit" onclick="return confirm('borrar?');">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>