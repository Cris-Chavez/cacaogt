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
                    <h3 class="mb-0">Datos de la empresa</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('empresa.index') }}" class="btn btn-sm btn-danger">Regresar</a>
                  </div>
                </div>
              </div>
            <hr class="my-3">
          <div class="card-body">

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Datos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>{{ $empresa->nombre}}</th>
                    </tr>
                    <tr>
                        <th>Correo Electrónico</th>
                        <th>{{ $empresa->email}}</th>
                    </tr>
                    <tr>
                      <th>Sitio Web</th>
                      <th>{{ $empresa->website}}</th>
                    </tr>
                    <tr>
                      <th>Dirección</th>
                      <th>{{ $empresa->direccion}}</th>
                    </tr>
                    <tr>
                        <th>Fecha de creación</th>
                        <th>{{ $empresa->created_at}}</th>
                    </tr>
                    <tr>
                        <th>Última modificación</th>
                        <th>{{ $empresa->updated_at}}</th>
                    </tr>
                  </tbody>
                </table>
              </div>


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