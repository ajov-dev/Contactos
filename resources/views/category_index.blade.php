@extends('base')
@section('content')
    <div class="container" style="margin:2vh auto;">
        <div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
            <div>
                <h1>Categorias</h1>
            </div>
            <div>
                <a class="btn btn-outline-dark btn-rounded btn btn-outline-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#modal_create"
                    href="{{ route('category.create.get') }}"> Crear Categoria </a>

                <!-- Modal -->
                <div class="modal top fade" id="modal_create" tabindex="-1" aria-labelledby="modal_create"
                    aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
                    <div class="modal-dialog modal-lg  modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('category.create.post') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal_create">Crear Categoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre de la categoria"
                                        class="form-control mt-3" required maxlength="30">
                                    <input type="text" name="descripcion" id="descripcion" maxlength="50"
                                        placeholder="Pequeña desprición." class="form-control mt-3">
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-outline-dark btn-rounded btn" data-bs-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-outline-success btn-rounded">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- fin del modal --}}
            </div>
        </div>
        <div class="table">
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
                    @foreach ($categories as $category)
                        <tr>
                            <th>
                                <div class="w-25 m-auto"><i class="bi bi-people-fill"></i></div>
                            </th>
                            <td>{{ $category->nombre }}</td>
                            <td>{{ $category->descripcion }}</td>
                            <td>
                                <div class="d-flex row">
                                    <div class="col-4">
                                        <a class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal"
                                            data-bs-target="#modal_update_{{ $category->id }}"> Editar </a>
                                    </div>
                                    <div class="col-8">
                                        <a class="btn btn-outline-danger btn-rounded" data-bs-toggle="modal"
                                            data-bs-target="#modal_destroy_{{ $category->id }}"> eliminar </a>
                                    </div>
                                </div>
                            </td>
                            {{-- inicio modal update --}}
                            <div class="modal top fade" id="modal_update_{{ $category->id }}" tabindex="-1"
                                aria-labelledby="modal_update_{{ $category->id }}" aria-hidden="true"
                                data-bs-backdrop="true" data-bs-keyboard="true">
                                <div class="modal-dialog modal-lg  modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('category.update.post', ['user_id' => $category->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_update_{{ $category->id }}">Crear
                                                    Categoria</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="nombre" id="nombre"
                                                    value="{{ $category->nombre }}" placeholder="Nombre de la categoria"
                                                    class="form-control mt-3" required maxlength="30">
                                                <input type="text" name="descripcion"
                                                    value="{{ $category->descripcion }}" id="descripcion" maxlength="50"
                                                    placeholder="Pequeña desprición." class="form-control mt-3">
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-outline-secondary btn-rounded"
                                                    data-bs-dismiss="modal">Cerrar</a>
                                                <button type="submit" class="btn btn-outline-success btn-rounded">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- fin modal update --}}
                            {{-- inicio modal delete --}}
                            <div class="modal top fade" id="modal_destroy_{{ $category->id }}" tabindex="-1"
                                aria-labelledby="modal_destroy_{{ $category->id }}" aria-hidden="true"
                                data-bs-backdrop="true" data-bs-keyboard="true">
                                <div class="modal-dialog modal-lg  modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('category.destroy.post', ['user_id' => $category->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="modal_destroy_{{ $category->id }}">Eliminar
                                                    Categoria</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Estas seguro de eliminar la categoria: "{{ $category->nombre }}"?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-outline-secondary btn-rounded"
                                                    data-bs-dismiss="modal">Cancelar</a>
                                                <button type="submit" class="btn btn-outline-danger btn-rounded">Eliminar definitivamente</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                                {{-- fin del modal --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- Asegúrate de incluir jQuery en tu proyecto antes de esto -->
@endsection
