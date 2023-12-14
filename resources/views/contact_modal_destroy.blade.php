<div class="modal top fade" id="modal_destroy_{{ $contact->id }}" tabindex="-1"
    aria-labelledby="modal_destroy_{{ $contact->id }}" aria-hidden="true"
    data-bs-backdrop="true" data-bs-keyboard="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('contact.destroy.post', ['user_id' => $contact->id]) }}"
                method="post">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="modal_destroy_{{ $contact->id }}">Eliminar
                        Categoria</h3>
                    <button onclick="location.reload(true)" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-dark">¿Estas seguro de eliminar la categoria: "{{ ucfirst($contact->nombre . " " . $contact->apellido) }}"?</h4>
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
