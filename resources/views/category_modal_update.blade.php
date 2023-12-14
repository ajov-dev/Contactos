<div class="modal top fade" id="modal_update_{{ $category->id }}" tabindex="-1"
	aria-labelledby="modal_update_{{ $category->id }}" aria-hidden="true"
	data-bs-backdrop="true" data-bs-keyboard="true">
	<div class="modal-dialog modal-lg  modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('category.update.post', ['user_id' => $category->id]) }}"
				method="post">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title text-dark" id="modal_update_{{ $category->id }}">Crear
						Categoria</h4>
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
