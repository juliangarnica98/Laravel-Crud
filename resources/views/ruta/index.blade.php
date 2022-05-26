@extends('layouts.layout')
@section('titulo','- Rutas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
@endsection
@section('contenido')
    <div class="container">
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active pl-2 pr-2" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h1>Rutas Creadas</h1> 
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#rutaModal"><i class="fas fa-plus"></i> Nueva</button><br><br>
            <div class="card">
                <div class="card-body " >
                    <div id="tabla-rutas">
                        @include('ruta.tablaRuta')
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="rutaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="agregarRuta" action="{{route('ruta.agregar')}}">
                @csrf         
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label">Origen</label>
                        <input type="text" name="origen" class="form-control form-control-alternative" required>                    
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Destino</label>
                        <input type="text" name="destino" class="form-control form-control-alternative" required>                    
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Precio</label>
                        <input type="number" name="precio" class="form-control form-control-alternative" required>                    
                    </div>
                </div>            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info">Guardar ruta</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @section('js')
        <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    @endsection

    <script>

        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(event){
                    event.preventDefault(); 
                    var page = $(this).attr('href').split('page=')[1];
                    getData(page);
                });

                
        });

        var getData = function(page){
                    $.ajax({
                        url:'?page=' + page,
                        type : 'get',
                        datatype : 'html',
                        success:function(data){
                            console.log(data);
                            $('#tabla-rutas').empty().html(data);
                        }
                    });
                }
        var listarRuta = function(){
            $.ajax({
                type:'get',
                url: "{{url('tablaruta')}}",
                success: function(data){
                    $('#tabla-rutas').empty().html(data);
                }
            });
        }
        

        $("#agregarRuta").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('ruta.agregar')}}",
                type: "POST",
                data:$('#agregarRuta').serialize(),
                
                success:function(response)
                {
                    if(response){
                        alert('enviado');
                        $('#rutaModal').modal('hide');
                        listarRuta();
                    }else{
                        alert('error');
                    }
                }
            });
        });
    </script>
@endsection