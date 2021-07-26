@extends('layouts.master')
@section('css')

@section('title')
    @lang('main.attendance')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.attendance')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.attendance')</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title">#</h5>
                        <div class="accordion gray plus-icon round">
                            @foreach($grades as $grade)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{$grade->Name}}</a>
                                    <div class="acd-des">
                                        <table  class="table table-striped table-bordered p-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('section.section_name')</th>
                                                <th>@lang('class.class_name')</th>
                                                <th>@lang('section.status')</th>
                                                <th>@lang('section.processes')</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($grade->classrooms as $classroom)
                                                @foreach($classroom->sections as  $section)
                                                <tr>
                                                    <td>{{$section->id}}</td>
                                                    <td>{{$section->name}}</td>
                                                    <td>{{$section->classroom->name}}</td>
                                                    <td class="{{$section->status ==1? 'text-success':'text-danger'}}">{{$section->status ==1? __('section.active'):__('section.unactive')}}</td>
                                                    <td>
                                                        <a href="{{route('attendances.show',$section->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">@lang('main.students_list')</a>


                                                    </td>
                                                </tr>
                                            </tbody>



                                            @endforeach
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@section('js')

@endsection
