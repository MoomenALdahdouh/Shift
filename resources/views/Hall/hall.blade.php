@extends('layouts.master')
@section('css')
{{--{{--//TODO:: MO//OMEN S. ALD//AHDOUH 12/15/2021--}}--}}
@section('title')
    Halls
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Halls</a></li>
                    <li class="breadcrumb-item active">Hall</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
            <button id="create_event" class="btn btn-primary mb-3">
                Create Halls
            </button>
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="table-responsive" style="padding: 30px">
                        <table id="halls-table" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <script src="{{ asset('js/halls.js') }}" defer></script>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
{{--{{--//TODO:: MOOM/EN S. ALD//*AHDOUH 12/15/2021--}}--}}
