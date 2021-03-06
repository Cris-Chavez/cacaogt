@extends('layouts.forms')

@section('title', 'Accede a tu cuenta')
@section('subtitle', 'Ingresa tus credenciales')

@section('content')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">            
          <div class="card-body px-lg-5 py-lg-5">
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> Tus credenciales son incorrectas.
            </div>
            @endif
            
            <form role="form" method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Correo Electrónico" type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Contraseña" type="password" id="password" name="password" required>
                  
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
