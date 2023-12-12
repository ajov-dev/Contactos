@extends('base')

@section('content')
	<section class="vh-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="px-5 ms-xl-4">
						<i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
					</div>
					<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
						<form action="{{ route($action) }}" method="POST" class="card card-body" style="width: 23rem;">
							@csrf
							<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">{{ $title }}</h3>

							@if ($action == 'signup')
								<div class="form-outline mb-4">
									<input type="text" id="name" name="name" value="{{ old('name') }}"
										class="form-control form-control-lg" />
									<label for="name">Ingrese su nombre</label>
									@error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
								</div>
							@endif

							<div class="form-outline mb-4">
								<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" />
								<label for="email">Ingrese su correo electronico</label>
								@error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
							</div>

							<div class="form-outline mb-4">
								<input type="password" id="password" name="password"
									class="form-control form-control-lg" />
								<label class="form-label" for="password">Ingrese su contraseña</label>
								@error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
							</div>

							<div class="pt-1 mb-4">
								<button class="btn btn-info btn-lg btn-block" type="submit" class="btn btn-primary"
									data-mdb-modal-init data-mdb-target="#exampleModal">{{ $context_button }}</button>
							</div>

							<p><a href="{{ route($redirect_link) }}" class="link-info">{{ $context_link }}</a></p>
						</form>
					</div>
				</div>

				<div class="col-sm-6 px-0 d-none d-sm-block">
					<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
						alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
				</div>
			</div>
		</div>
	</section>
@endsection
