@extends('base')
@section('content')
	<div class="container">
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
							<th>
								<div style="display: flex; flex-direction: column"><i class="bi bi-people-fill" style="margin: 0 auto;"></i>
								</div>
							</th>
							<td>{{ isset($contact->categoria->nombre) ? ucfirst($contact->categoria->nombre) : 'Sin Categoria' }}</td>
							<td>{{ ucfirst($contact->nombre) }} {{ ucfirst($contact->apellido) }}</td>
							<td>{{ ucfirst($contact->telefono) }}</td>
							<td>{{ ucfirst($contact->email) }}</td>
							<td>{{ ucfirst($contact->direccion) }}</td>
							<td>
								<div style="">
									<div style="display: inline">
										<button class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal"
											data-bs-target="#modal_update_{{ $contact->id }}"> Editar </button>
										@include('contact_modal_update')
									</div>
									<div style="display: inline">
										<!-- Button trigger modal -->
										<button class="btn btn-outline-danger btn-rounded" data-bs-toggle="modal"
											data-bs-target="#modal_destroy_{{ $contact->id }}"> Eliminar </button>
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
