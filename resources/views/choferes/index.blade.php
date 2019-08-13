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
                                    <li><a href="#">Conductores</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Gráfica de Despacho</strong>
                        </div>
                        <div class="card-body card-block">
                            <div style="width:100%; height: 50%;">
                                {!! $chartjs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
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
                                <strong class="card-title">Listado de Conductores</strong>
                                <a href="{{ route('choferes.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-star"></i>&nbsp; Registrar Conductor</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Rut</th>
                                            <th>Edad</th>
                                            <th>licencia</th>
                                            <th>Certificado</th>
                                            <th>Status</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($choferes as $key)
                                        <tr>
                                            <td>{{ $key->nombres }}</td>
                                            <td>{{ $key->apellidos }}</td>
                                            <td>{{ $key->rut }}</td>
                                            <td>{{ $key->edad }}</td>
                                            <td>{{ $key->licencia }}</td>
                                            <td>{{ $key->certificado }}</td>
                                            <td>
                                                @if($key->status=="Activo")
                                                    <span class="badge badge-success">{{ $key->status }}</span>
                                                @elseif($key->status=="Reposo")
                                                    <span class="badge badge-warning">{{ $key->status }}</span>
                                                @elseif($key->status=="Retirado")
                                                    <span class="badge badge-danger">{{ $key->status }}</span>
                                                @endif
                                            </td>
                                            <td align="center">
                                                @if(buscar_asignacion($key->id)=="No" and $key->status=="Activo")
                                                    <a href="{{ route('choferes.asignar',$key->id) }}" title="Asignar Camión" class="btn btn-info btn-sm"><i class="fa fa-truck"></i>&nbsp; </a>
                                                @elseif(buscar_asignacion($key->id)!=="No" and $key->status=="Activo")
                                                    <a href="{{ route('choferes.retirar',$key->id) }}" title="Retirar Camión" class="btn btn-info btn-sm"><i class="fa fa-times"></i>&nbsp; </a>
                                                @endif
                                                <a href="{{ route('choferes.edit',$key->id) }}" title="Actualizar Conductor" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp; </a>
                                                <a href="#" title="Eliminar Conductor" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="eliminar('{{ $key->id }}')" data-toggle="modal" data-target="#modalEliminar"></i>&nbsp; </a>
                                                <a href="#" title="Cambiar Status Conductor" class="btn btn-success btn-sm"><i class="fa fa-exchange" onclick="cambiar_status('{{ $key->id }}')" data-toggle="modal" data-target="#modalCambiarStatus"></i>&nbsp; </a>
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
                <h5 class="modal-title" id="smallLabel">Eliminar Conductor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    ¿Está seguro de eliminar éste registro?
                </p>
                 {!! Form::open(['route' => ['choferes.destroy',1033], 'method' => 'DELETE']) !!}
                @csrf
             <input type="hidden" name="id_chofer" id="id_chofer">       
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
                <h5 class="modal-title" id="smallLabel">Cambiar Status de Conductor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    ¿Está seguro de cambiar el status?
                </p>
                 {!! Form::open(['route' => ['choferes.cambiar'], 'method' => 'POST']) !!}
                @csrf
             <input type="hidden" name="id_chofer" id="id_chofer2">
             <div class="row form-group">
                <div class="col col-md-3">
                    <label for="certificado" class=" form-control-label"> Status</label>
                </div>
                <div class="col-12 col-md-9">
                    <select class="form-control" name="status" id="status">
                        <option value="Activo">Activo</option>
                        <option value="Reposo">Reposo</option>
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
    function eliminar(id_chofer) {
        $("#id_chofer").val(id_chofer);
    }

    function cambiar_status(id_chofer) {
        $("#id_chofer2").val(id_chofer);
    }
</script>
@endsection