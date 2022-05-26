<div class=" table-responsive-sm" >
    <table  class="table table-hover table-sm ">
        <thead  class="thead-dark">
            <tH class="text-center">ID</th>
            <tH class="text-center">Origen - Destino</th>
            <tH class="text-center">Precio</th>
            <tH class="text-center">Modificar</th>
            <tH class="text-center">Eliminar</th>
        </thead>
        @foreach($rutas as $ruta)
        <tbody>
            <td class="text-center">{{ $ruta->id }}</td>
            <td class="text-center">{{ $ruta->descripcion }}</td>
            <td class="text-center">{{ $ruta->precio }}</td>
            <td class="text-center"><a href="" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> </td>
            <td class="text-center"><a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> </td>
        </tbody>    
        @endforeach
    </table>
    {{ $rutas->render() }}
</div>

        
