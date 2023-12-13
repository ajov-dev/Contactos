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
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_name"
                            id="contact_name" placeholder="Nombre..." value="{{ $contact->nombre }}">
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_lastname"
                            id="contact_lastname" placeholder="Apellido..." value="{{ $contact->apellido }}">
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_phone"
                            id="contact_phone" placeholder="Telefono..." value="{{ $contact->telefono }}">
                        <input class="form-control form-control-lg mb-2" required type="email" name="contact_email"
                            id="contact_email" placeholder="Email..." value="{{ $contact->email }}">
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_address"
                            id="contact_address" placeholder="Direccion..." value="{{ $contact->direccion }}">
                        <select class="form-control form-control-lg mb-2" name="contact_category" id="contact_category"
                            onclick="UpdateInputCategory(this)">
                            @foreach ($categories as $category)
                                @if ($category->id == $contact->categoria->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->nombre }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                @endif
                            @endforeach
                            <option value="-1">Otra opción </option>
                            <input class="form-control form-control-lg mb-2" id="contacto_category_update"
                                style="display: none; " placeholder="Ingrese la nueva categoria" type="text"
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
    function UpdateInputCategory(selectElement) {
        var input_category = document.getElementById('contacto_category_update');
        var campoTextoInput = document.getElementById('campoTexto');

        if (selectElement.value == -1) {
            input_category.style.display = 'block';
            campoTextoInput.setAttribute('required', 'required');
        } else {
            input_category.style.display = 'none';
            campoTextoInput.removeAttribute('required');
        }
    }
</script>
