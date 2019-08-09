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
                                    <li><a href="#">Despacho de Camiones</a></li>
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
                                <strong class="card-title">Listado de Despachos de Camiones de Hoy</strong>
                                <a href="{{ route('despachos.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-star"></i>&nbsp; Registrar Despacho de Camión de hoy</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nro. Guía</th>
                                            <th>Patente</th>
                                            <th>Chofer</th>
                                            <th>Kg Pesaje</th>
                                            <th>Hora de Salida</th>
                                            <th>Total Kgs de Salida</th>
                                            <th>Observaciones</th>
                                            <th>Status</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($despachos as $key)
                                        <tr>
                                            <td>{{ $key->num_guia }}</td>
                                            <td>{{ $key->patente }}</td>
                                            <td>{{ $key->chofer->apellidos }}, {{ $key->chofer->nombres }} - RUT: {{ $key->chofer->rut }}</td>
                                            <td>{{ $key->kg_pesaje }}</td>
                                            <td>{{ $key->hora_salida }}</td>
                                            <td>{{ $key->total_kg_salida }}</td>
                                            <td>{{ $key->observaciones }}</td>
                                            <td>{{ $key->status }}</td>
                                            <td align="center">
                                                
                                                <a href="{{ route('despachos.edit',$key->id) }}" title="Actualizar Despacho" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp; </a>
                                                <a href="#" title="Elimiar Despacho" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="eliminar('{{ $key->id }}')" data-toggle="modal" data-target="#modalEliminar"></i>&nbsp; </a>
                                                <a href="#" title="Cambiar Status Despacho" class="btn btn-success btn-sm"><i class="fa fa-lock" onclick="cambiar_status('{{ $key->id }}','{{ $key->status }}')" data-toggle="modal" data-target="#modalCambiarStatus"></i>&nbsp; </a>
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
                <h5 class="modal-title" id="smallLabel">Eliminar Despacho</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    ¿Está seguro de eliminar éste registro?
                </p>
                 {!! Form::open(['route' => ['despachos.destroy',1033], 'method' => 'DELETE']) !!}
                @csrf
             <input type="hidden" name="id_despacho" id="id_despacho">       
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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallLabel">Cambiar Status de Despacho</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    ¿Está seguro de cambiar el status?
                </p>
                 {!! Form::open(['route' => ['despachos.cambiar'], 'method' => 'POST']) !!}
                @csrf
             <input type="hidden" name="id_despacho" id="id_despacho2">
             <div class="row form-group">
                <div class="col col-md-12">
                    <b>Cambiar Status a </b><span id="nuevo_status"></span>
                </div>
                <input type="hidden" name="status" id="status">
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
    function eliminar(id_despacho) {
        $("#id_despacho").val(id_despacho);
    }

    function cambiar_status(id_despacho,status_actual) {
        $("#id_despacho2").val(id_despacho);
        if (status_actual=="Realizado") {
            $("#nuevo_status").text("Cancelado");
            $("#nuevo_status").css('color','red');
            $("#status").val('Cancelado');
        }else{
            $("#nuevo_status").text("Realizado");
            $("#nuevo_status").css('color','green');
            $("#status").val('Realizado');
        }
    }
</script>
@endsection