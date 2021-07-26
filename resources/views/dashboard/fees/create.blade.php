@extends('layouts.master')
@section('css')

@section('title')
    @lang('main.fees')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.fees')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item">@lang('main.fees')</li>
                    <li class="breadcrumb-item active">@lang('fees.create')</li>

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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('fees.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.title_ar')</label>
                                <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                                @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.title_en')</label>
                                <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.title_ku')</label>
                                <input type="text" value="{{ old('title_ku') }}" name="title_ku" class="form-control">
                                @error('title_ku')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.amount')</label>
                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                                @error('amount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">@lang('students.grade')</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{trans('parent.choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.classroom')</label>
                                <select class="custom-select mr-sm-2" name="classroom_id">

                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.year')</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('parent.choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.fee_type')</label>
                                <select class="custom-select mr-sm-2" name="fee_type">
                                    <option>--------</option>
                                    <option value="1">@lang('fees.school_fee')</option>
                                    <option value="2">@lang('fees.bus_fee')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">@lang('fees.description')</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">@lang('students.submit')</button>

                    </form>

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

                            $('select[name="classroom_id"]').empty();
                            $('select[name="classroom_id"]').append('<option selected disabled >{{trans('parent.choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
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
