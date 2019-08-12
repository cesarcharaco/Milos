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
                                    <li><a href="#">Tablero</a></li>
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
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-id"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$total_conductores}}</span></div>
                                            <div class="stat-heading">Conductores</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-truck"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$total_camiones}}</span></div>
                                            <div class="stat-heading">Camiones</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-note"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$total_despachos}}</span></div>
                                            <div class="stat-heading">Despacho de camiones</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-note2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$total_recepciones}}</span></div>
                                            <div class="stat-heading">Recepciones</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
                <!-- Orders -->
                @php $despachos1=despachos(); @endphp
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Despachos y Entregas </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">Nro. Guía</th>
                                                    <th class="avatar">Patente</th>
                                                    <th>Chofer</th>
                                                    <th>Kg pesaje</th>
                                                    <th>Hora de salida</th>
                                                    <th>Total Kgs de salidad</th>
                                                    <th>Status de Despacho</th>
                                                    <th>Status de Recepción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($despachos1 as $key)
                                                <tr>
                                                    <td>{{ $key->num_guia }}</td>
                                                    <td>{{ $key->patente }}</td>
                                                    <td>{{ $key->chofer->apellidos }}, {{ $key->chofer->nombres }} - RUT: {{ $key->chofer->rut }}</td>
                                                    <td>{{ $key->kg_pesaje }}</td>
                                                    <td>{{ $key->hora_salida }}</td>
                                                    <td>{{ $key->total_kg_salida }}</td>
                                                    <td>
                                                        @if($key->status=="Realizado")
                                                            <span class="badge badge-complete">{{ $key->status }}</span>
                                                        @else
                                                            <span class="badge badge-pending">{{ $key->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $key->recepciones->status }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>
                <!-- /.orders -->

            </div>
            <!-- .animated -->
        </div>
@endsection
