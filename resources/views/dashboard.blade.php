@extends('base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-dark ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">nombre completo</th>
                        <th scope="col">telefono</th>
                        <th scope="col">correo</th>
                        <th scope="col">grupo</th>
                        <th scope="col">acciones</th>
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
                                    <a style="display: inline" href="{{ route('printer.get' , ['id' => $i,])}}"
                                        class="btn btn-primary">Editar</a>
                                    {{-- <a href="{{ route('contact.edit', $i) }}" class="btn btn-primary">Editar</a> --}}
                                    {{-- <form action="{{ route('contact.destroy', $i) }}" method="POST"> --}}
                                    <form style="display: inline" action="{{ route('printer.get' , ['id' => $i,])}}" method="POST">
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
