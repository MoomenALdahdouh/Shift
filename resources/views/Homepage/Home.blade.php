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
            <div class="card-body">
                <!--begin: Datatable -->
<!--
                <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" role="form" id="add_edit_form" autocomplete="off" enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf

                    <div class="portlet-body form">
                        <div class="ibox">
                            <div class="ibox-content">
                                <input type="hidden" name="locale" value="ar"/>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="s_name" class="form-control-label">{{trans('HomeEdits.Pagetitle(EN)')}}</label>
                                        <input type="text"  name="s_name[ar]"  required id="s_title" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="s_title" class="form-control-label">{{trans('HomeEdits.Pagetitle(AR)')}}</label>
                                        <input type="text"  name="s_title[ar]"  required id="s_title" class="form-control" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_edit">موافق</button>
                    </div>
                </form>
-->


                <form action="{{ route('update_page.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                @csrf

                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="row">

                        <!--    Page title       -->
                        <div class="form-group col-lg-6">
                            <label for="s_name" class="form-control-label">{{trans('HomeEdits.Pagetitle(EN)')}}</label>
                            <input type="text"  name="pagetitle_en"  class="form-control" value="{{$editpages->Pagetitle}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="s_title" class="form-control-label">{{trans('HomeEdits.Pagetitle(AR)')}}</label>
                            <input type="text"  name="pagetitle_ar" class="form-control" value="{{$editpages->Pagetitle}}">
                        </div>

                        <!--   Page Meta title        -->

                        <div class="form-group col-lg-6">
                            <label for="s_name" class="form-control-label">{{trans('HomeEdits.PageMetatitle(EN)')}}</label>
                            <input type="text"  name="Metatitle_en"  class="form-control" value="{{$editpages->Metatitle}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="s_title" class="form-control-label">{{trans('HomeEdits.PageMetatitle(AR)')}}</label>
                            <input type="text"  name="Metatitle_ar" class="form-control" value="{{$editpages->Metatitle}}">
                        </div>


                        <!--   Page Meta description         -->

                        <div class="form-group col-lg-6">
                            <label for="s_name" class="form-control-label">{{trans('HomeEdits.PageMetadescription(EN)')}}</label>
                            <input type="text"  name="Metadescription_en"  class="form-control" value="{{$editpages->Metadescription}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="s_title" class="form-control-label">{{trans('HomeEdits.PageMetadescription(AR)')}}</label>
                            <input type="text"  name="Metadescription_ar" class="form-control" value="{{$editpages->Metadescription}}">
                        </div>

                        <div class="col-lg-6">
                            <label for="s_meta_tags">الكلمات الدلالية:</label>
                            <select style="width:100%;height: 40px" class="form-control kt-select2" name="s_meta_tags[][ar]" id="s_meta_tags" multiple>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-success">{{ trans('SEO-trans.Editsubmit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--end::Body-->
                <p>Page content goes here<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>

<!-- row closed -->
@endsection
@section('js')

@endsection
