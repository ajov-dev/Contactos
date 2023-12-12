@extends('base')
@section('content')
    <div class="container" style="margin:5vh auto;">
        <div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
            <div>
                <h1 class="text-light">Dashboard</h1>
            </div>

            <div>
                <a class="btn btn-outline-light btn-rounded" data-mdb-ripple-color="#001111"
                    href="{{ route('contact.create.view') }}"> Crear Usuario </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-dark ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <th><i class="bi bi-people-fill"></i></th>
                            <td>Name {{ $i }}</td>
                            <td>6578367{{ $i }}</td>
                            <td>mail{{ $i }}{{ '@' }}correo.com</td>
                            <td>grupo{{ $i }}</td>
                            {{-- inserta 2 botones editar, eliminar --}}
                            <td>
                                <div class="flex">
                                    <a style="display: inline" href="{{ route('printer.get', ['id' => $i]) }}"
                                        class="btn btn-primary">Editar</a>
                                    {{-- <a href="{{ route('contact.edit', $i) }}" class="btn btn-primary">Editar</a> --}}
                                    {{-- <form action="{{ route('contact.destroy', $i) }}" method="POST"> --}}
                                    <form style="display: inline" action="{{ route('printer.get', ['id' => $i]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endfor
                </tbody>

            </table>
        </div>
    </div>
@endsection
