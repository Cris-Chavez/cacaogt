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
                    <h3 class="mb-0">Roles</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('rol.create') }}" class="btn btn-sm btn-success">Agregar rol</a>
                  </div>
                </div>
              </div>
            <hr class="my-3">
          <div class="card-body">

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush" id="empleados">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Rol</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $rol)
                      <tr>
                          <th>{{ $rol->rol }}</th>
                          <th>{{ $rol->descripcion }}</th>
                          <th>
                            <a href="{{ route('rol.edit', $rol->id) }}"><button class="btn btn-primary btn-sm">Editar</button></a>
                            <a href="{{ route('rol.show', $rol->id) }}"><button class="btn btn-info btn-sm">Detalles</button><a>
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deleteModal{{ $rol->id }}">Eliminar</button>                  
                          </th>
                      </tr>
                      
                      {{--Modal Confirmación Eliminación--}}
                      <div class="modal fade" id="deleteModal{{ $rol->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Eliminar rol</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ¿Desea eliminar al rol {{ $rol->rol }}? 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <form action="{{ route('rol.destroy', $rol->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')                    
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                              </form>                    
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      @endforeach
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