<div class="modal top fade" id="modal_update_{{ $contact->id }}" tabindex="-1"
	aria-labelledby="modal_update_{{ $contact->id }}" aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
	<div class="modal-dialog modal-lg  modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('contact.update.post', ['user_id' => $contact->id]) }}" method="post">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title text-dark" id="modal_update_{{ $contact->id }}">Actualizar Contacto</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
						onclick="location.reload(true)"></button>
				</div>
				<div class="modal-body">
					<div class="modal-body">
						@csrf
						<input class="form-control form-control-lg mb-2" required type="text"
							name="contact_name"
							id="contact_name" placeholder="Nombre..." minlength="5" maxlength="30" value="{{ ucfirst($contact->nombre) }}">

						<input class="form-control form-control-lg mb-2" minlength="5" maxlength="30" type="text"
							name="contact_lastname"
							id="contact_lastname" placeholder="Apellido..." value="{{ ucfirst($contact->apellido) }}">

						<input class="form-control form-control-lg mb-2" required minlength="7" maxlength="15" type="text"
							name="contact_phone"
							id="contact_phone" placeholder="Telefono..." value="{{ ucfirst($contact->telefono) }}">

						<input class="form-control form-control-lg mb-2" required minlength="5" maxlength="30" type="email"
							name="contact_email"
							id="contact_email" placeholder="Email..." value="{{ ucfirst($contact->email) }}">

						<input class="form-control form-control-lg mb-2" minlength="10" maxlength="50" type="text" name="contact_address"
							id="contact_address" placeholder="Direccion..." value="{{ ucfirst($contact->direccion) }}">

						<select class="form-control form-control-lg mb-2" name="contact_category"
							id="contact_category_{{ $contact->id }}"
							onclick="UpdateInputCategory(this, {{ $contact->id }})">
							<option value="{{ $contact->categoria->id }}" selected>
								{{ ucfirst($contact->categoria->nombre) }}
							</option>
							@foreach ($categories as $category)
								@if ($category->id != $contact->categoria_id)
									<option value="{{ $category->id }}">
										{{ ucfirst($category->nombre) }}
									</option>
								@endif
							@endforeach
							<option value="{{ -1 }}">Otra opción </option>
							<input class="form-control form-control-lg mb-2" id="contacto_category_update_{{ $contact->id }}"
								style="display: none; " placeholder="Ingrese la nueva categoria" minlength="5" maxlength="30" type="text"
								name="contacto_category_update">
						</select>
					</div>
					<div class="modal-footer">
						<a type="button" class="btn btn-outline-secondary btn-rounded" data-bs-dismiss="modal"
							onclick="location.reload(true)">Cerrar</a>
						<button type="submit" class="btn btn-outline-success btn-rounded">Actualizar</button>
					</div>
			</form>
		</div>
	</div>
</div>
<script>
	function UpdateInputCategory(selectElement, contactId) {
		const input_category = document.getElementById("contacto_category_update_" + contactId);

		if (selectElement.value != -1) {
			input_category.style.display = 'none';
			input_category.removeAttribute('required');
		} else {
			input_category.style.display = 'block';
			input_category.setAttribute('required', 'required');
		}
	}
</script>
