@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tablero</h1>
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
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Listado de conductores</strong>
                                <a href="{{ route('choferes.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-star"></i>&nbsp; Registrar conductor</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Rut</th>
                                            <th>Género</th>
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
                                            <td>{{ $key->genero }}</td>
                                            <td>{{ $key->licencia }}</td>
                                            <td>{{ $key->certificado }}</td>
                                            <td>{{ $key->status }}</td>
                                            <td align="center">
                                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp; </a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; </a>
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
@endsection
