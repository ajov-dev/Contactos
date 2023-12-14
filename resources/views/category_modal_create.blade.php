<div class="modal top fade" id="modal_create" tabindex="-1" aria-labelledby="modal_create"
	aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
	<div class="modal-dialog modal-lg  modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('category.create.post') }}" method="post">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title text-dark" id="modal_create">Crear Categoria</h4>
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
