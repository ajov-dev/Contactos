<div class="modal top fade" id="modal_update_{{ $contact->id }}" tabindex="-1" aria-labelledby="modal_update_{{ $contact->id }}" aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('contact.update.post', ['user_id' => $contact->id]) }}"
                method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title text-dark" id="modal_update_{{ $contact->id }}">Crear
                        Categoria</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        @csrf
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_name"
                            id="contact_name" placeholder="Nombre...">
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_lastname"
                            id="contact_lastname" placeholder="Apellido...">
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_phone"
                            id="contact_phone" placeholder="Telefono...">
                        <input class="form-control form-control-lg mb-2" required type="email" name="contact_email"
                            id="contact_email" placeholder="Email...">
                        <input class="form-control form-control-lg mb-2" required type="text" name="contact_address"
                            id="contact_address" placeholder="Direccion...">
                        <select class="form-control form-control-lg mb-2" name="contact_category" id="contact_category"
                            onchange="mostrarCampoTexto(this)">
                            <option value="" disabled selected>Seleccione una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                            @endforeach
                            <option value="-1">Otra opción </option>
                            <input class="form-control form-control-lg mb-2" id="input_category" style="display: none; "
                                placeholder="Ingrese la nueva categoria" type="text" name="new_categoria"
                                id="new_categoria">
                        </select>
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
