@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                        <a class="btn btn-success btn-sm"
                                           href="{{ route('roles.show', $role->id) }}">عرض</a>


                                        <a class="btn btn-primary btn-sm"
                                           href="{{ route('roles.edit', $role->id) }}">تعديل</a>


                                    @if ($role->name !== 'owner')
                                        @can('حذف صلاحية')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                            $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
