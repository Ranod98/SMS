@extends('layouts.master')
@section('css')

@section('title')
    @lang('exams.add_exam')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.add_subject')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.exams')</li>
                    <li class="breadcrumb-item active">@lang('exams.add_exam')</li>
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

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('exams.store')}}" method="post" autocomplete="off">
                                @csrf

                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">@lang('exams.exam_name_ar')</label>
                                        <input type="text" name="name_ar" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label for="title">@lang('exams.exam_name_en')</label>
                                        <input type="text" name="name_en" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label for="title">@lang('exams.exam_name_ku')</label>
                                        <input type="text" name="name_ku" class="form-control">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="title">@lang('exams.term')</label>
                                        <input type="number" name="term" class="form-control">
                                    </div>
                                    <div class="form-group col">
                                        <label for="academic_year">{{trans('students.academic_year')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>{{trans('parent.choose')}}...</option>
                                            @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                <option value="{{ $year}}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">@lang('section.save')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('getClassrooms') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log('AJAX load did  work');

                            $('select[name="class_id"]').empty();
                            $('select[name="class_id"]').append('<option selected disabled >{{trans('parent.choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
