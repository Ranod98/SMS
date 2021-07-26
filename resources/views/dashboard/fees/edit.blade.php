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
                    <li class="breadcrumb-item active">@lang('fees.edit')</li>

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

                    <form action="{{route('fees.update',$fee->id)}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.title_ar')</label>
                                <input type="text" value="{{$fee->getTranslation('title','ar')}}" name="title_ar" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.title_en')</label>
                                <input type="text" value="{{$fee->getTranslation('title','en')}}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.title_ku')</label>
                                <input type="text" value="{{$fee->getTranslation('title','ku')}}" name="title_ku" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.amount')</label>
                                <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">@lang('students.grade')</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}" {{$grade->id == $fee->grade_id ? 'selected' : ""}}>{{ $grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.classroom')</label>
                                <select class="custom-select mr-sm-2" name="classroom_id">
                                    <option value="{{$fee->classroom_id}}">{{$fee->classroom->name}}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.year')</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>


                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.fee_type')</label>
                                <select class="custom-select mr-sm-2" name="fee_type">
                                    <option>--------</option>
                                    <option value="1" {{$fee->fee_type == 1 ? 'selected' : ''}}>@lang('fees.school_fee')</option>
                                    <option value="2"{{$fee->fee_type == 2 ? 'selected' : ''}} >@lang('fees.bus_fee')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">@lang('fees.description')</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="4">{{$fee->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">@lang('students.submit')</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
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
