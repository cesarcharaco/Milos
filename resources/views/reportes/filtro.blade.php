@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Reportes</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Gráficas</a></li>
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
                <div class="clearfix"></div>
                <!-- Orders -->

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
                        <div class="card-body text-center">
                            <a class="btn btn-info btn-xs" href="{{ route('reportes.index') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
        </div>
@endsection
