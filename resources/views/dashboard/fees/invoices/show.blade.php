@extends('layouts.master')
@section('css')

@section('title')
    @lang('fees.fees_invoices')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.fees') {{$student->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.fees_invoices')</li>
                    <li class="breadcrumb-item active">@lang('fees.fee_add')</li>
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

                    <form class=" row mb-30" action="{{ route('feesInvoices.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="feesList">
                                    <div data-repeater-item>
                                        <div class="row">


                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">@lang('fees.fee_type')</label>
                                                <div class="box">
                                                    <select class="fancyselect" name="fee_id" required>
                                                        <option value="">--------------</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="description" class="mr-sm-2">@lang('fees.description')</label>
                                                <div class="box">
                                                    <input type="text" class="form-control" name="description" required>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ trans('fees.process') }}:</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('fees.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ trans('fees.add_row') }}"/>
                                    </div>
                                </div><br>
                                <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                                <input type="hidden" name="classroom_id" value="{{$student->class_id}}">
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                <button type="submit" class="btn btn-primary">@lang('students.submit')</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
