@extends('layouts.master')
@section('css')

@section('title')
    @lang('main.grades')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.grades')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.grades')</li>
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        @lang('grades.add_grade')
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('grades.grade_name')</th>
                                <th>@lang('grades.note')</th>
                                <th>@lang('grades.processes')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grades as $index => $grade)
                            <tr>
                                <td>{{$index+1000}}</td>
                                <td>{{$grade->Name}}</td>
                                <td>{{$grade->Notes}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}"
                                            title="{{ trans('grades.edit') }}"><i
                                            class="fa fa-edit"></i> @lang('grades.edit')</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}"
                                            title="{{ trans('grades.delete') }}"><i
                                            class="fa fa-trash"></i> @lang('grades.delete')</button>

                                </td>
                            </tr>

                            {{--                            edit                            --}}
                            <div class="modal fade" id="edit{{$grade->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grades.edit_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{route('grades.update',$grade->id)}}" method="POST">
                                                @csrf
                                                @method('patch')
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">@lang('grades.grade_name_ar'):</label>
                                                        <input id="Name" type="text" name="Name_ar" class="form-control" required value="{{$grade->getTranslation('Name','ar')}}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">@lang('grades.grade_name_en'):</label>
                                                        <input type="text" class="form-control" name="Name_en" required value="{{$grade->getTranslation('Name','en')}}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_ku" class="mr-sm-2">@lang('grades.grade_name_ku'):</label>
                                                        <input type="text" class="form-control" name="Name_ku" required value="{{$grade->getTranslation('Name','ku')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">@lang('grades.note')
                                                        :</label>
                                                    <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{$grade->Notes}}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">@lang('grades.close')</button>
                                                    <button type="submit"
                                                            class="btn btn-success">@lang('grades.update')</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grades.delete_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('grades.destroy',$grade->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                {{ trans('grades.confirm_delete') }}
                                                <input id="id" type="text" name="id" class="form-control "
                                                       value="{{ $grade->Name }}" disabled>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('grades.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('grades.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>






        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('grades.add_grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{route('grades.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name"
                                           class="mr-sm-2">@lang('grades.grade_name_ar')
                                        :</label>
                                    <input id="Name" type="text" name="Name_ar" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2">@lang('grades.grade_name_en')
                                        :</label>
                                    <input type="text" class="form-control" name="Name_en" required>
                                </div>
                                <div class="col">
                                    <label for="Name_ku"
                                           class="mr-sm-2">@lang('grades.grade_name_ku')
                                        :</label>
                                    <input type="text" class="form-control" name="Name_ku" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">@lang('grades.note')
                                    :</label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br><br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang('grades.close')</button>
                                <button type="submit"
                                        class="btn btn-success">@lang('grades.save')</button>
                            </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')

@endsection
