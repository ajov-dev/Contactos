@auth
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <!-- Container wrapper -->
            <div class="container">

                <!-- Navbar brand -->
                <div>
                    <a class="navbar-brand" href="{{route ('dashboard')}}"> - {{ auth()->user()->name }}</a>
                </div>

                <!-- Collapsible wrapper -->
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.create.view') }}">crear contacto</a>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('signout') }}" method="post">
                                @csrf
                                <button class="btn btn-dark">cerrar sesion</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    @endauth
