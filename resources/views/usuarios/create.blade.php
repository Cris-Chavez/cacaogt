@extends('home')

@section('content')

<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Nuevo Usuario</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('usuario.index') }}" class="btn btn-sm btn-danger">Cancelar y regresar</a>
                  </div>
                </div>
              </div>
            <hr class="my-3">
          <div class="card-body">

            <form action="{{ route('usuario.store') }}" method="POST">
                @csrf                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email" class="form-control-label">Correo Eléctronico</label>                
                      <input class="form-control" type="text" placeholder="Ingrese el correo del empleado" id="email" name="email" >
                      @error('email')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="rol" class="form-control-label">Rol</label>
                      <select class="form-control" name="rol" data-style="btn-secondary">
                        @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->rol }}</option>                    
                        @endforeach
                      </select>                      
                    </div>
                  </div>
                </div>{{--row--}}           
                <button type="submit" class="btn btn-success">Agregar</button>
              </form>


          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
    
@endsection