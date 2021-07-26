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
                <h4 class="mb-0">@lang('main.fees')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.fees_invoices')</li>
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
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>@lang('fees.name')</th>
                                            <th>@lang('fees.fee_type')</th>
                                            <th>@lang('fees.amount')</th>
                                            <th>@lang('students.grade')</th>
                                            <th>@lang('fees.classroom')</th>
                                            <th>@lang('fees.description')</th>
                                            <th>@lang('fees.process')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feeInvoices as $feeInvoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$feeInvoice->student->name}}</td>
                                                <td>{{$feeInvoice->fee->title}}</td>
                                                <td>{{ number_format($feeInvoice->amount, 2) }}</td>
                                                <td>{{$feeInvoice->grade->Name}}</td>
                                                <td>{{$feeInvoice->classroom->name}}</td>
                                                <td>{{$feeInvoice->description}}</td>
                                                <td>
                                                    <a href="{{route('feesInvoices.edit',$feeInvoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$feeInvoice->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('dashboard.fees.invoices.delete')
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

@endsection
