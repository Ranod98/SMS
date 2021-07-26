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
                <h4 class="mb-0">@lang('fees.fee_edit')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.fees_invoices')</li>
                    <li class="breadcrumb-item active">@lang('fees.fee_edit')</li>
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

                    <form action="{{route('feesInvoices.update',$feeInvoice->id)}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.name')</label>
                                <input type="text" value="{{$feeInvoice->student->name}}" readonly name="title_ar" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">@lang('fees.amount')</label>
                                <input type="number" value="{{$feeInvoice->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputZip">@lang('fees.fee_type')</label>
                                <select class="custom-select mr-sm-2" name="fee_id">
                                    @foreach($fees as $fee)
                                        <option value="{{$fee->id}}" {{$fee->id == $feeInvoice->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">@lang('fees.description')</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$feeInvoice->description}}</textarea>
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

@endsection
