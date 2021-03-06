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
                    <h3 class="mb-0">Editar empresa</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('empresa.index') }}" class="btn btn-sm btn-danger">Cancelar y regresar</a>
                  </div>
                </div>
              </div>
            <hr class="my-3">
          <div class="card-body">

            <form action="{{ route('empresa.update',$empresa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre" class="form-control-label">Nombres de la empresa</label>                
                      <input class="form-control" type="text" placeholder="Ingrese el nombre de la empresa" id="nombre" name="nombre" value="{{ old('nombre',$empresa->nombre) }}">
                      @error('nombre')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email" class="form-control-label">Correo Electrónico</label>
                      <input class="form-control" type="text" placeholder="Ingrese el correo de la empresa" id="email" value="{{ old('email',$empresa->email) }}" name="email">
                      @error('email')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                  </div>          
                </div>{{--row--}}                 
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="website" class="form-control-label">Dirección Web</label>                
                      <input class="form-control" type="text" placeholder="Ingrese la dirección Web de la empresa" id="website" name="website" value="{{ old('website',$empresa->website) }}" >
                      @error('website')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="direccion" class="form-control-label">Dirección</label>
                      <input class="form-control" type="text" placeholder="Ingrese la dirección de la empresa" id="direccion" name="direccion" value="{{ old('direccion',$empresa->direccion) }}">
                      @error('direccion')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="direccion" class="form-control-label">Logo</label>
                      <input class="form-control" type="file" placeholder="Ingrese la dirección de la empresa" id="logo" name="logo" value="{{ old('logo',$empresa->logo) }}" accept="image/*">
                      @error('logo')
                        <strong class="text-red">{{ $message }}</strong>                          
                      @enderror
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