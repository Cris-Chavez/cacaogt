@extends('home')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('content')

<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">API SuperHéroes</h3>
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
                      <th scope="col">Héroe</th>
                      <th scope="col">Atributos</th>
                    </tr>
                  </thead>
                  {{-- <tbody>
                      @php
                          $p = $listado[0];                          
                      @endphp
                      @for ($i = 0; $i < 5; $i++)
                        @php
                            $p = $listado[$i];
                            $poderes = $p["powerstats"];
                            $biografia = $p["biography"];
                            $apariencia = $p["appearance"];
                            $imagen = $p["image"];
                        @endphp
                        <tr>
                            <th>{{ $p["name"] }}</th>
                            <th>
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#powerModal{{ $p["id"] }}">Poderes</button>
                                <button type="submit" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#biographyModal{{ $p["id"] }} ">Biografía</button>
                                <button type="submit" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#appearanceModal{{ $p["id"] }}">Apariencia</button>
                                <button type="submit" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#imageModal{{ $p["id"] }}">Imagen</button>
                            </th>
                        </tr>

                      <!-- poderes -->
                      <div class="modal fade" id="powerModal{{ $p["id"] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Poderes {{ $p["name"] }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              {{"Inteligencia: ".$poderes["intelligence"]}}<br><br>
                              {{"Fuerza: ".$poderes["strength"]}}<br><br>
                              {{"Velocidad: ".$poderes["speed"]}}<br><br>
                              {{"Durabilidad: ".$poderes["durability"]}}<br><br>
                              {{"Poder: ".$poderes["power"]}}<br><br>
                              {{"Combate: ".$poderes["combat"]}}
                            </div>
                            <div class="modal-footer">                              
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>                
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- biografia -->
                      <div class="modal fade" id="biographyModal{{ $p["id"] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Biografía {{ $p["name"] }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              {{"Nombre Completo: ".$biografia["full-name"]}}<br><br>
                              {{"Alter Egos: ".$biografia["alter-egos"]}}<br><br>
                              {{"Lugar de Nacimiento: ".$biografia["place-of-birth"]}}<br><br>
                              {{"Primera aparicion: ".$biografia["first-appearance"]}}<br><br>
                              {{"Editora: ".$biografia["publisher"]}}<br><br>
                              {{"Alineación: ".$biografia["alignment"]}}
                            </div>
                            <div class="modal-footer">                              
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>                
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- apariencia -->
                      <div class="modal fade" id="appearanceModal{{ $p["id"] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apariencia de {{ $p["name"] }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @php
                                $altura = $apariencia["height"];
                                $peso = $apariencia["weight"];
                            @endphp
                            <div class="modal-body">
                              {{"Género: ".$apariencia["gender"]}}<br><br>
                              {{"Raza: ".$apariencia["race"]}}<br><br>
                              {{"Altura: ".$altura[1]}}<br><br>
                              {{"Peso: ".$peso[0]}}<br><br>
                              {{"Color de ojos: ".$apariencia["eye-color"]}}<br><br>
                              {{"Color de cabello: ".$apariencia["hair-color"]}}
                            </div>
                            <div class="modal-footer">                              
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>                
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- imagen -->
                      <div class="modal fade" id="imageModal{{ $p["id"] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Imagen de {{ $p["name"] }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{$imagen["url"] }} " class="img-fluid">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">                              
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>                
                            </div>
                          </div>
                        </div>
                      </div>
                          
                      @endfor
                  </tbody> --}}

                  <tbody>
                    <tr>
                      <th>{{ $heroes->name }}</th>
                      {{-- @foreach ($heroes->biography as $bio) --}}
                        <th>{{ $heroes->biography->alignment }}</th>                          
                      {{-- @endforeach --}}
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

    
    
@endsection

@section('script')
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>   
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script> 
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#empleados').DataTable({
                responsive  : true,
                autoWidth   : false,
                "language": {
                            "lengthMenu": "Mostrar _MENU_ registros por página",
                            "zeroRecords": "Nada encontrado - disculpa",
                            "info": "Mostrando la página _PAGE_ de _PAGES_",
                            "infoEmpty": "No records available",
                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                            "search" : "Buscar:",
                            "paginate" : {
                                "next" : ">",
                                "previous" : "<"
                            }
                        }
            });
        } );
    </script>
@endsection