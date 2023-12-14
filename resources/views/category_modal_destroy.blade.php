<div class="modal top fade" id="modal_destroy_{{ $category->id }}" tabindex="-1"
	aria-labelledby="modal_destroy_{{ $category->id }}" aria-hidden="true"
	data-bs-backdrop="true" data-bs-keyboard="true">
	<div class="modal-dialog modal-lg  modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('category.destroy.post', ['user_id' => $category->id]) }}"
				method="post">
				@csrf
				<div class="modal-header">
					<h3 class="modal-title text-dark" id="modal_destroy_{{ $category->id }}">Eliminar
						Categoria</h3>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close" onclick="location.reload(true)"></button>
				</div>
				<div class="modal-body">
					<h4 class="text-dark">¿Estas seguro de eliminar la categoria: "{{ $category->nombre }}"?</h4>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-outline-secondary btn-rounded"
						data-bs-dismiss="modal" onclick="location.reload(true)">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success btn-rounded">Eliminar definitivamente</button>
				</div>
			</form>
		</div>
	</div>
</div>
