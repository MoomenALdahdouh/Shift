@extends('layouts.master')
@section('css')

@section('title')
    Custom Users
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
                Create Custom User
            </button>
            <div class="card card-statistics">
                <div class="card-body">
                    <input type="hidden" value="{{$page_type}}" id="page_type">
                    <div class="bg-white overflow-hidden shadow-xl ">
                        <div class="table-responsive" style="padding: 30px">
                            <table id="custom-users-table" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Banner</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('js/custom_users.js') }}" defer></script>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
