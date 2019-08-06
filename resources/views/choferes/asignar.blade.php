@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Asignación de Camiones</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{ route('choferes.index') }}">Conductores</a></li>
                                    <li class="active">Asignación de Camiones</li>
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
                                <strong>Asignando Camiones a Conductor</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('choferes.asignacion') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <label for="chofer" class=" form-control-label">
                                            {{ $chofer->nombres }} {{ $chofer->apellidos }} - RUT: {{ $chofer->rut }} </label>
                                        </div>
                                        <input type="hidden" name="id_chofer" id="id_chofer" value="{{ $chofer->id }}">
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="camion" class=" form-control-label"><b style="color: red;">*</b> Camiones</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="id_camion" id="id_camion" required="required">
                                                @foreach($camiones as $key)
                                                    @php $cont=0; @endphp
                                                    @foreach($asignaciones as $key2)
                                                        @if($key->id==$key2->id_camion)
                                                            @php $cont++; @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($cont==0)
                                                        <option value="{{ $key->id }}">{{ $key->modelo }} - {{ $key->marca }} - VIN: {{ $key->vin }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Asignar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
        </div>
@endsection
