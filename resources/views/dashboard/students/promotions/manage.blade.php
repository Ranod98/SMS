@extends('layouts.master')
@section('css')

@section('title')
    @lang('main.promotions')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> @lang('main.promotions')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active"> @lang('main.students')</li>
                    <li class="breadcrumb-item active"> @lang('main.promotions')</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#Delete_all">
                                    @lang('students.roll_back_all')
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students.student_name')}}</th>
                                            <th class="alert-danger">@lang('students.old_grade')</th>
                                            <th class="alert-danger">@lang('students.old_year')</th>
                                            <th class="alert-danger">@lang('students.old_class')</th>
                                            <th class="alert-danger">@lang('students.old_section')</th>
                                            <th class="alert-success">@lang('students.new_grade')</th>
                                            <th class="alert-success">@lang('students.new_year')</th>
                                            <th class="alert-success">@lang('students.new_class')</th>
                                            <th class="alert-success">@lang('students.new_section')</th>
                                            <th>{{trans('students.processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->fromGrade->Name}}</td>
                                                <td>{{$promotion->from_year}}</td>
                                                <td>{{$promotion->fromClass->name}}</td>
                                                <td>{{$promotion->fromSection->name}}</td>
                                                <td>{{$promotion->toGrade->Name}}</td>
                                                <td>{{$promotion->to_year}}</td>
                                                <td>{{$promotion->toClass->name}}</td>
                                                <td>{{$promotion->toSection->name}}</td>


                                                <td>

                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">@lang('students.roll_back')</button>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Return_Student{{ $promotion->student->id }}" title="{{ trans('students.graduate') }}">@lang('students.graduate')</button>

                                                </td>
                                            </tr>
                                        @include('dashboard.students.promotions.delete_all')
                                        @include('dashboard.students.promotions.delete_one')
                                        @include('dashboard.students.promotions.graduated')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
