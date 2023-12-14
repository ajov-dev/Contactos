@extends('base')
@section('content')
	<div class="container">
		<div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
			<div>
				<h1>Categorias</h1>
			</div>
			<div>
				<a class="btn btn-outline-dark btn-rounded btn btn-outline-dark btn-rounded" data-bs-toggle="modal"
					data-bs-target="#modal_create"
					href="{{ route('category.create.get') }}"> Crear Categoria </a>

				<!-- Modal create -->
				@include('category_modal_create')
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
										{{-- inicio modal update --}}
										@include('category_modal_update')
										{{-- fin modal update --}}
									</div>
									<div class="col-8">
										<a class="btn btn-outline-danger btn-rounded" data-bs-toggle="modal"
											data-bs-target="#modal_destroy_{{ $category->id }}"> eliminar </a>
										{{-- inicio modal delete --}}
										@include('category_modal_destroy')
										{{-- fin del modal --}}
									</div>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>
	<nav aria-label="navigation">
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link" href="{{ $categories->previousPageUrl() }}">Anterior</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="{{ $categories->nextPageUrl() }}">Siguiente</a>
			</li>
		</ul>
	</nav>
@endsection
