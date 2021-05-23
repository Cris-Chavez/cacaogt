@extends('home')

{{-- @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection --}}

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">        
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> 
    <link href="https//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />        

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">        
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> 
    <link href="https//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
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
                    <h3 class="mb-0">Empleados</h3>
                  </div>
                  <div class="col text-right">
                    <a href="{{ route('empleado.create') }}" class="btn btn-sm btn-success">Agregar empleado</a>
                  </div>
                </div>
              </div>
            <hr class="my-3">
          <div class="card-body">

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush" id="myTable">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Empresa</th>     
                      <th scope="col">Correo</th>
                      <th scope="col">Teléfono</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($empleados as $empleado)
                      <tr>
                          <th>{{ $empleado->nombre }}</th>
                          <th>{{ $empleado->apellido }}</th>
                          <th>{{ $empleado->empresa->nombre }}</th>
                          <th>{{ $empleado->email }}</th>
                          <th>{{ $empleado->telefono }}</th>
                          <th>
                            <a href="{{ route('empleado.edit', $empleado->id) }}"><button class="btn btn-primary btn-sm">Editar</button></a>
                            <a href="{{ route('empleado.show', $empleado->id) }}"><button class="btn btn-info btn-sm">Detalles</button><a>
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deleteModal{{ $empleado->id }}">Eliminar</button>                  
                          </th>
                      </tr>
                      
                      {{--Modal Confirmación Eliminación--}}
                      <div class="modal fade" id="deleteModal{{ $empleado->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Eliminar empleado</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ¿Desea eliminar al empleado {{ $empleado->nombre }} {{ $empleado->apellido }}? 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST" style="display:inline">
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

{{-- @section('script')
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
@endsection --}}

@section('script')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>         
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>    
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script> --}}

    


{{-- funcion DataTable --}}
<script>      
    $('#myTable').DataTable({
      responsive: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ datos por página",
                "zeroRecords": "Nada encontrado - Disculpa",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No existen datos",
                "infoFiltered": "(Filtrado de un total de _MAX_ datos totales)",
                "search": "Buscar:",
                "paginate":{
                    next : ">",
                    previous: "<"
                }
            },
            dom: '<"row"<"col-sm-12 col-md-4"l><"col-md-4 text-center"B><"col-md-4 text-right"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [
                {
                    extend: "excel",
                    text: '<i class="far fa-file-excel"></i>',
                    className: "btn-success btn-sm mr-1",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    }
                },
                {
                    extend: "pdf",
                    text: '<i class="far fa-file-pdf"></i>',
                    className: "btn-danger btn-sm mr-1",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    },
                    messageTop: 'Información de los empleados',
                    title: "Exportación a PDF"
                },           
                {
                    extend: "print",
                    text: '<i class="fas fa-paint-brush"></i>',
                    className: "btn-info btn-sm",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    }
                }
            ]
      
    });
</script>    
@endsection