@extends('base')
@section('content')
    <div class="container" style="margin:;">
        <div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
            <div>
                <h1 class="">Dashboard</h1>
            </div>

            <div>
                <button class="btn btn-outline-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#modal_create"> Crear
                    Usuario </button>
                <!-- Modal -->
                @include('contact_modal_create')
                {{-- fin del modal --}}
            </div>
        </div>
        <div class="table">
            <table class="table table-striped table-hover table-dark ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- verifica si existe la variable contacts --}}
                    @foreach ($contacts as $contact)
                        <tr>
                            <th><i class="bi bi-people-fill m-auto"></i></th>
                            <td>{{ $contact->categoria_id }}</td>
                            <td>{{ $contact->nombre }} {{ $contact->apellido }}</td>
                            <td>{{ $contact->telefono }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->direccion }}</td>
                            <td>
                                <div style="display: flex; flex-direction:row; justify-content: start; gap: 2rem">
                                    <div style="display: inline">
                                        <button class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal"
                                            data-bs-target="#modal_update_{{ $contact->id }}"> Editar </button>
                                        @include('contact_modal_update')
                                    </div>
                                    <div style="display: inline">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-outline-danger btn-rounded" data-bs-toggle="modal"
                                            data-bs-target="#modal_destroy_{{ $contact->id }}"> eliminar </button>
                                        @include('contact_modal_destroy')
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection
