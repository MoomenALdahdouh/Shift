@extends('layouts.master')
@section('css')

@section('title')
    @switch($customuser->type)
        @case(0)
        Edit Agents
        @break
        @case (1)
        Edit
        @break
        @case (2)
        Edit
        @break
        @case (3)
        Edit
        @break
    @endswitch
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
            <div class="card card-statistics">
                <div class="card-body">
                    {{--User details header--}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-1">
                                    <img class="user-image" width="60" src="{{asset('images/user.png')}}">
                                </div>
                                <div class="col-11">
                                    <h5 class="name mt-2">{{$customuser->name}}</h5>
                                    @switch($customuser->staus)
                                        @case (0)
                                        <p class="paragraph-pended shadow">Pended</p>
                                        @break
                                        @case(1)
                                        <p class="paragraph-active shadow">Active</p>
                                        @break
                                    @endswitch
                                </div>

                            </div>
                            <br>
                            <div class="alert-light">
                                <div class="alert alert-secondary">
                                    <strong><i class="las la-user-tie text-primary"></i>Email
                                    </strong>
                                    <br>
                                    <p> &nbsp &nbsp {{$customuser->email}}</p>
                                    <br>
                                    <strong><i class="las la-phone text-primary"></i>Phone
                                    </strong>
                                    <br>
                                    @if($customuser->phone==''||$customuser->phone==NULL)
                                        <p> &nbsp; &nbsp; Phone</p>
                                    @else
                                        <p> &nbsp; &nbsp; {{@$customuser->phone}}</p>
                                    @endif
                                    <br>
                                    <div class="">
                                        <strong><i
                                                class="las la-calendar-check text-primary"></i>Created
                                            At
                                        </strong>
                                        <br>
                                        <p>&nbsp; &nbsp; {{$customuser->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--User edit--}}
                    <br id="edit-user">
                    <div class="mt-3">
                        <div class="card-header alert alert-light">
                            <h1><i class="las la-pen-square "></i>Edit Section</h1>
                            <div class="mt-5">
                                <ul class="ul-project" style="list-style-type: none; margin: 0; padding: 0">
                                    <li>
                                        <input type="hidden" id="user-id" name="user-id"
                                               value="{{$customuser->id}}">
                                        <div class="">
                                            <div>
                                                <h4><i
                                                        class="las la-signature text-primary"></i>Name
                                                </h4>
                                            </div>
                                            <input
                                                class="form-control"
                                                id="name" type="text" value="{{$customuser->name}}">
                                        </div>
                                        <br>
                                        <div class="">
                                            <div>
                                                <h4>
                                                    <i class="las la-phone text-primary"></i>Phone
                                                </h4>
                                            </div>
                                            @if ($customuser->phone === '' || $customuser->phone === NULL)
                                                <input
                                                    class="form-control"
                                                    id="phone" type="text"
                                                    value="{{__('strings.no_phone')}}">
                                            @else
                                                <input
                                                    class="form-control"
                                                    id="phone" type="text" value="{{$customuser->phone}}">
                                            @endif
                                        </div>
                                    </li>
                                    <br>
                                    <li>
                                        <div>
                                            <h4>
                                                <i class="las la-toggle-off text-primary"></i>&nbsp;Status
                                            </h4>
                                        </div>
                                        <div class="form-check form-switch" style="padding: 0;margin: 0">
                                            <input data-id="{{$customuser->id}}" class="toggle-class" type="checkbox"
                                                   data-onstyle="success"
                                                   data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                   data-off="Inactive" data-size="xs"
                                                {{$customuser->status ? 'checked' : ''}}
                                            >
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <li>
                                        <button id="update-user" class="btn btn-primary float-right"><i
                                                class="lar la-save"></i> Save
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    {{--Section Remove project--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="row alert alert-danger text-dark"
                                     style=" margin: 0; padding-left:0; padding-right: 0">
                                    <div class="col-md-10">
                                        <strong class="pt-2"><i class="las la-trash"></i>&nbsp; Remove this User!
                                        </strong>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="remove-user"
                                                class="btn btn-danger float-right">Remove Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" value="0" id="is_user_page">
                    </div>
                </div>

                <script src="{{asset('js/user.js')}}" defer></script> {{--Must add defer to active js file--}}
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
