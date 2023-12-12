@extends('base')
@section('content')
    <div class="container" style="margin:2vh auto;">
        <div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
            <div>
                <h1 class="">Categorias</h1>
            </div>

            <div>
                <a class="btn btn-outline-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#modal_create"
                    href="{{ route('category.create.get') }}"> Crear Categoria </a>

                <!-- Modal -->
                <div class="modal top fade" id="modal_create" tabindex="-1" aria-labelledby="modal_create" aria-hidden="true"
                    data-bs-backdrop="true" data-bs-keyboard="true">
                    <div class="modal-dialog modal-lg  modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('printer.post') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal_create">Crear Categoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre de la categoria"
                                        class="form-control mt-3">
                                    <input type="text" name="descripcion" id="descripcion" maxlength="10"
                                        placeholder="Pequeña desprición." class="form-control mt-3">
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- fin del modal --}}
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-dark ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre de Categoria</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <th><i class="bi bi-people-fill"></i></th>
                            <td>Category {{ $i }}</td>
                            <td>dejskgs jsdkhg ksdhg{{ $i }}</td>
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

    <!-- Asegúrate de incluir jQuery en tu proyecto antes de esto -->


@endsection
