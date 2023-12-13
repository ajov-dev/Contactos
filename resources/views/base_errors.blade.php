<div class="container mt-2 ">
    {{-- si exite una variable success muestramelo --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Excelente!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- si existe algun error muestramelo --}}

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps</strong> {{ session('error') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
