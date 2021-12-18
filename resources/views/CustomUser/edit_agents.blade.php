@extends('layouts.master')
@section('css')
{{--{{--//TODO:: MOOM*EN S. ALDAHDO*UH 12/15/2021--}}--}}
@section('title')
    Edit Agent
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <!--                <h1 class="fs-1">EDIT AGENTS</h1>-->
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
                            <strong><i class="far fa-caret-square-right"></i> Agent details</strong>
                            <div class="row mt-4">
                                <div class="col-1 ">
                                    <img class="user-image" width="60" src="{{asset('images/user.png')}}">
                                </div>
                                <div class="col-11 p-0">
                                    <h5 class="name mt-2">{{$customuser->name}}</h5>
                                    @switch($customuser->status)
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
                                    <p>{{$customuser->email}}</p>
                                    <br>
                                    <strong><i class="las la-phone text-primary"></i>Phone
                                    </strong>
                                    <br>
                                    @if($customuser->phone==''||$customuser->phone==NULL)
                                        <p>Phone</p>
                                    @else
                                        <p>{{@$customuser->phone}}</p>
                                    @endif
                                    <br>
                                    <div class="">
                                        <strong><i
                                                class="las la-calendar-check text-primary"></i>Created
                                            At
                                        </strong>
                                        <br>
                                        <p>{{$customuser->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--User edit--}}
                    <br id="edit-user">
                    <div class="mt-3">
                        <div class="card-header alert alert-light">
                            <strong><i class="far fa-caret-square-right"></i> Edit Agent</strong>
                            <div class="mt-4">
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
                                                    <i class="las la-phone text-primary"></i>Email
                                                </h4>
                                            </div>
                                            <input
                                                class="form-control"
                                                id="email" type="text" value="{{$customuser->email}}">
                                        </div><br>
                                        <div class="">
                                            <div>
                                                <h4>
                                                    <i class="las la-phone text-primary"></i>Phone
                                                </h4>
                                            </div>
                                            <input
                                                class="form-control"
                                                id="phone" type="text" value="{{$customuser->phone}}">
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
                                            <input id="status" class="toggle-class" type="checkbox"
                                                   data-onstyle="success"
                                                   data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                   data-off="Inactive" data-size="xs"
                                                {{$customuser->status ? 'checked' : ''}}>
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <li>
                                        <button id="update-agents" class="btn btn-primary float-right"><i
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
                                        <p class="pt-2"><i class="fas fa-exclamation-triangle"></i>&nbsp;
                                            Remove<strong> {{$customuser->name}} </strong>Agents!
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="remove-agents"
                                                class="btn btn-danger float-right"><strong>Remove Now</strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" value="0" id="is_user_page">
                    </div>
                </div>

                @include('moom.modal_alert')
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{asset('js/edit_agents.js')}}" defer></script> {{--Must add defer to active js file--}}
@endsection
{{--{{--//TODO:: M*OOMEN S*. ALDAHDO*UH 12/15/2021--}}--}}
