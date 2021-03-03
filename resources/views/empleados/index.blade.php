@extends('layouts.app')

@section('content')
<div class="container">
<h1>Mostrando lista de empleados</h1>

    @if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
    @endif

    <a href="{{ url('empleados/create') }}" class="btn btn-outline-info">Nuevo</a>
    <br>
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
                    <img src="{{ asset('storage') . '/' . $e->foto }}" alt="" class="img-thumbnail img-fluid">
                </td>
                <td> {{ $e->nombre }} </td>
                <td> {{ $e->apellido }} </td>
                <td> {{ $e->correo }} </td>
                <td>
                    <a href="{{ url('/empleados/'. $e->id . '/edit') }}" class="btn btn-outline-warning">
                        Editar
                    </a>
                    
                    <!-- d-inline mueve el form a la par de editar -->
                    <form action="{{ url('/empleados/'.$e->id) }}" method="post" class="d-inline">
                        <!-- Llave que dejara entrar al metodo de laravel, crea un token -->
                        {{ csrf_field() }}

                        <!-- agregamos el tipo de solicitud que haremos -->
                        {{ method_field('DELETE') }}

                        <button type="submit" onclick="return confirm('borrar?');" class="btn btn-outline-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection