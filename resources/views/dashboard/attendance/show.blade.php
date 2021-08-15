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
                    <li class="breadcrumb-item"><a href="{{route('attendances.index')}}" class="default-color">@lang('main.attendance')</a></li>
                    <li class="breadcrumb-item active">@lang('main.show')</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')





    <!-- row closed -->

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">

                <!-- row -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('status') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger"> @lang('main.date') : {{ date('Y-m-d') }}</h5>

                        <div class="accordion gray plus-icon round">
                            <form method="post" action="{{ route('attendances.store') }}">

                                @csrf
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">{{ trans('students.name') }}</th>
                                        <th class="alert-success">{{ trans('students.email') }}</th>
                                        <th class="alert-success">{{ trans('students.gender') }}</th>
                                        <th class="alert-success">{{ trans('students.Grade') }}</th>
                                        <th class="alert-success">{{ trans('students.classrooms') }}</th>
                                        <th class="alert-success">{{ trans('students.section') }}</th>
                                        <th class="alert-success">{{ trans('students.processes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->gender->name }}</td>
                                            <td>{{ $student->grade->Name }}</td>
                                            <td>{{ $student->classroom->name }}</td>
                                            <td>{{ $student->section->name }}</td>
                                            <td>
                                                @if(isset($student->attendances()->where('attendance_date',date('Y-m-d'))->first()->student_id))

                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input name="attendances[{{ $student->id }}]" disabled
                                                               {{ $student->attendances()->where('attendance_date',date('Y-m-d'))->first()->attendance_status == 1 ? 'checked' : '' }}
                                                               class="leading-tight" type="radio" value="presence">
                                                        <span class="text-success">@lang('main.presence')</span>
                                                    </label>

                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                        <input name="attendances[{{ $student->id }}]" disabled
                                                               {{ $student->attendances()->where('attendance_date',date('Y-m-d'))->first()->attendance_status == 0 ? 'checked' : '' }}
                                                               class="leading-tight" type="radio" value="absence">
                                                        <span class="text-danger">@lang('main.absence')</span>
                                                    </label>

                                                @else

                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                                               value="presence">
                                                        <span class="text-success">@lang('main.presence')</span>
                                                    </label>

                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                        <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                                               value="absence">
                                                        <span class="text-danger">@lang('main.absence')</span>
                                                    </label>

                                                @endif

                                                    <input type="hidden" name="student_id[]" value="{{ $student->id }}">



                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <P>
                                    <button class="btn btn-success" type="submit">{{ trans('students.submit') }}</button>
                                </P>
                            </form><br>
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
