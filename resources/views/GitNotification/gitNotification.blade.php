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

            <div class="card-header pb-0">
                <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export_getNotification') }}"
                   style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>

                <a class="modal-effect btn btn-sm btn-primary" href="{{ url('pdf_getNotification') }}"
                   style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير PDF</a>
            </div>

            <div class="card-body">

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">Add
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date of submission</th>
                            <th>Mobile Number</th>
                            <th>option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($gitNotification as $Notification)
                            @php
                                $i++
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $Notification->created_at}}</td>
                                <td>{{ $Notification->mobileNumber }}</td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-info btn-sm"
                                       data-target="#edit{{ $Notification->id }}"
                                       data-toggle="modal"
                                       title=""><i class="fa fa-edit"></i></a>

                                    <a  type="button" class="btn btn-danger btn-sm" href="#" data-notification_id="{{ $Notification->id }}"
                                       data-toggle="modal" data-target="#delete_Notification"><i class="fa fa-trash"></i>
                                        </a>
                                </td>
                            </tr>


                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $Notification->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('SEO-trans.EditModel') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('getNotification.update', 'test') }}" method="post">
                                            {{ method_field('patch') }}
                                            @csrf


                                                    <div class="col">
                                                        <label for="MobileNumber"
                                                               class="mr-sm-2">Mobile Number
                                                            :</label>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $Notification->id }}">

                                                        <input class="form-control"
                                                               value="{{$Notification->mobileNumber}}"
                                                               name="MobileNumber" >
                                                    </div>






                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('SEO-trans.Editclose') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('SEO-trans.Editsubmit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach

                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades_trans.add_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('widgets.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">Widget Name(EN)
                                :</label>
                            <input id="Name" type="text" name="widgetname_en" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Widget Name(AR)
                                :</label>
                            <input type="text" class="form-control" name="widgetname_ar">
                        </div>
                    </div>
                    <br><br>
                    <!-- Page Value-->
                    <div class="form-group">
                        <label
                            for="exampleFormControlTextarea1">Widget Value
                            :</label>
                        <textarea class="form-control" name="widgetvalue"
                                  id="exampleFormControlTextarea1"
                                  rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</div>



<!-- حذف الاشعار -->
<div class="modal fade" id="delete_Notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف الاشعار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!--                    هنا يذهب الي صفحة الكنترولر الي ميثود التدمير واذا حدث اي خطاء يذهب الي صفحة اسمها test-->
                <form action="{{ route('getNotification.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}  {{-- // عشان يعمل توكين وتشفير--}}
            </div>
            <div class="modal-body">
                هل انت متاكد من عملية الحذف ؟
                <input type="hidden" name="notification_id" id="notification_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                <button type="submit" class="btn btn-danger">تاكيد</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
    <script>
        $('#delete_Notification').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var notification_id = button.data('notification_id')
            var modal = $(this)
            modal.find('.modal-body #notification_id').val(notification_id);
        })
    </script>
@endsection
