@auth
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
        <!-- Container wrapper -->
        <div class="container">

            <!-- Navbar brand -->
            <div style="display: inline">
                <div style="display: inline">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div style="display: inline">
                    <a class="navbar-brand" href="{{ route('contact.index.get') }}"> - ¡Hello {{ auth()->user()->name }}!</a>
                </div>
            </div>

            <!-- Collapsible wrapper -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Opciones
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('category.index.get') }}">Administrar Categorias</a></li>

                    <li>
                        <form action="{{ route('signout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
@endauth
