<ul class="nav justify-content-center">
    @auth
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top mb-5">
            <!-- Container wrapper -->
            <div class="container-fluid">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">Contactos</a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.create.view') }}">crear contacto</a>
                        </li>

                        <li class="nav-item">
                            <form action="{{route ('signout')}}" method="post">@csrf<button class="btn btn-dark">cerrar sesion</button></form>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    @endauth
</ul>
