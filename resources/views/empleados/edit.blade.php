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
                    <h3 class="mb-0">Nuevo empleado</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('empleado.index') }}" class="btn btn-sm btn-danger">Cancelar y regresar</a>
                  </div>
                </div>
              </div>
            <hr class="my-3">
          <div class="card-body">

            <form action="{{ route('empleado.update',$empleado->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre" class="form-control-label">Nombres del empleado</label>                
                      <input class="form-control" type="text" placeholder="Ingrese los nombres del empleado" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}">
                      @error('nombre')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="apellido" class="form-control-label">Apellidos</label>
                      <input class="form-control" type="text" placeholder="Ingrese los apellidos del empleado" id="apellido" value="{{ old('apellido', $empleado->apellido) }}" name="apellido">
                      @error('apellido')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                  </div>          
                </div>{{--row--}}                 
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email" class="form-control-label">Correo Eléctronico</label>                
                      <input class="form-control" type="text" placeholder="Ingrese el correo del empleado" id="email" name="email" value="{{ old('email',$empleado->email) }}" >
                      @error('email')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="telefono" class="form-control-label">Teléfono</label>
                      <input class="form-control" type="text" placeholder="Ingrese el teléfono del empleado" id="telefono" name="telefono" value="{{ old('telefono', $empleado->telefono) }}">
                      @error('telefono')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="empresa" class="form-control-label">Empresa a la que va a pertenecer</label>
                      <select class="form-control" name="empresa" data-style="btn-secondary">
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>                    
                        @endforeach
                      </select>                      
                    </div>
                  </div>
                </div>{{--row--}}           
                <button type="submit" class="btn btn-success">Actualizar</button>
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