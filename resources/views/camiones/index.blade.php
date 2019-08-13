@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Listado</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Camiones</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        @include('flash::message')
                         @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            @include('flash::message')
                            <p>Corrige los siguientes errores:</p>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Listado de camiones</strong>
                                <a href="{{ route('camiones.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-star"></i>&nbsp; Registrar camión</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Modelo</th>
                                            <th>Marca</th>
                                            <th>Vin</th>
                                            <th>Año</th>
                                            <th>Capacidad</th>
                                            <th>Status</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($camiones as $key)
                                        <tr>
                                            <td>{{ $key->modelo }}</td>
                                            <td>{{ $key->marca }}</td>
                                            <td>{{ $key->vin }}</td>
                                            <td>{{ $key->anio }}</td>
                                            <td>{{ $key->capacidad }}</td>
                                            <td>
                                                @if($key->status=="Activo")
                                                    <span class="badge badge-success">{{ $key->status }}</span>
                                                @elseif($key->status=="Taller")
                                                    <span class="badge badge-warning">{{ $key->status }}</span>
                                                @elseif($key->status=="Retirado")
                                                    <span class="badge badge-danger">{{ $key->status }}</span>
                                                @endif
                                            </td>
                                            <td align="center">
                                                <a href="{{ route('camiones.edit',$key->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp; </a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="eliminar('{{ $key->id }}')" data-toggle="modal" data-target="#modalEliminar"></i>&nbsp; </a>
                                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-lock" onclick="cambiar_status('{{ $key->id }}')" data-toggle="modal" data-target="#modalCambiarStatus"></i>&nbsp; </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
        </div>
<!-- MOdal para eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="smallLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallLabel">Eliminar Camión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    ¿Está seguro de eliminar éste registro?
                </p>
                 {!! Form::open(['route' => ['camiones.destroy',1033], 'method' => 'DELETE']) !!}
                @csrf
             <input type="hidden" name="id_camion" id="id_camion">       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- fi del modal eliminar -->

<!-- MOdal para cambiar status -->
<div class="modal fade" id="modalCambiarStatus" tabindex="-1" role="dialog" aria-labelledby="smallLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallLabel">Cambiar Status del Camión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    ¿Está seguro de cambiar el status?
                </p>
                 {!! Form::open(['route' => ['camiones.cambiar'], 'method' => 'POST']) !!}
                @csrf
             <input type="hidden" name="id_camion" id="id_camion2">
             <div class="row form-group">
                <div class="col col-md-3">
                    <label for="certificado" class=" form-control-label"> Status</label>
                </div>
                <div class="col-12 col-md-9">
                    <select class="form-control" name="status" id="status">
                        <option value="Activo">Activo</option>
                        <option value="Taller">Taller</option>
                        <option value="Retirado">Retirado</option>
                    </select>
                    <small>Es obligatorio seleccionar un status</small>
                </div>
            </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- fi del modal cambiar status -->
@endsection
@section('scripts')
<script type="text/javascript">
    function eliminar(id_camion) {
        $("#id_camion").val(id_camion);
    }

    function cambiar_status(id_camion) {
        $("#id_camion2").val(id_camion);
    }
</script>
@endsection