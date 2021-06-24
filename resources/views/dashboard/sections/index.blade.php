@extends('layouts.master')
@section('css')

@section('title')
    @lang('main.sections')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.sections')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.sections')</li>
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
                    <div class="card-body">
                        <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('section.add_section') }}</a>
                    </div>

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
                            @foreach($class as $classroom)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{$classroom->name}}</a>
                                <div class="acd-des">
                                    <table  class="table table-striped table-bordered p-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('section.section_name')</th>
                                            <th>@lang('section.status')</th>
                                            <th>@lang('section.processes')</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($classroom->sections as $section)
                                       <tr>
                                           <td>{{$section->id}}</td>
                                            <td>{{$section->name}}</td>
                                            <td class="{{$section->status ==1? 'text-success':'text-danger'}}">{{$section->status ==1? __('section.active'):__('section.unactive')}}</td>
                                           <td>
                                               <a href="#"
                                                  class="btn btn-outline-info btn-sm"
                                                  data-toggle="modal"
                                                  data-target="#edit{{ $section->id }}">{{ trans('section.edit') }}</a>
                                               <a href="#"
                                                  class="btn btn-outline-danger btn-sm"
                                                  data-toggle="modal"
                                                  data-target="#delete{{ $section->id }}">{{ trans('section.delete') }}</a>
                                           </td>
                                        </tr>
                                        </tbody>


                                        <!--edit section -->
                                        <div class="modal fade"
                                             id="edit{{ $section->id }}"
                                             tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            style="font-family: 'Cairo', sans-serif;"
                                                            id="exampleModalLabel">
                                                            {{ trans('section.edit_section') }}
                                                        </h5>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form
                                                            action="{{ route('sections.update', $section->id) }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            {{ csrf_field() }}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text"
                                                                           name="name_section_ar"
                                                                           class="form-control"
                                                                           value="{{ $section->getTranslation('name', 'ar') }}">
                                                                </div>

                                                                <div class="col">
                                                                    <input type="text"
                                                                           name="name_section_en"
                                                                           class="form-control"
                                                                           value="{{ $section->getTranslation('name', 'en') }}">
                                                                </div>


                                                                <div class="col">
                                                                    <input type="text"
                                                                           name="name_section_ku"
                                                                           class="form-control"
                                                                           value="{{ $section->getTranslation('name', 'ku') }}">
                                                                    <input id="id"
                                                                           type="hidden"
                                                                           name="id"
                                                                           class="form-control"
                                                                           value="{{ $section->id }}">
                                                                </div>

                                                            </div>
                                                            <br>

                                                            <div class="col">
                                                                <label for="inputName"
                                                                       class="control-label">{{ trans('section.name_class') }}</label>
                                                                <select name="class_id"
                                                                        class="custom-select">
                                                                    @foreach($class as $classroom)
                                                                        <option value="{{$classroom->id}}" {{$classroom->id == $section->class_id ? 'selected': ''}}>{{$classroom->name}}</option>

                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br>

                                                            <div class="col">
                                                                <div class="form-check">

                                                                        <input
                                                                            type="checkbox"
                                                                            {{$section->status == 1 ?'checked':''}}
                                                                            class="form-check-input"
                                                                            name="status"
                                                                            value="1"
                                                                            id="exampleCheck1">


                                                                    <label
                                                                        class="form-check-label"
                                                                        for="exampleCheck1">{{ trans('section.status') }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <label for="inputName" class="control-label">{{ trans('section.teacher_name') }}</label>
                                                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                    @foreach($teachers as $teacher)
                                                                        <option value="{{$teacher->id}}" {{ is_array( $teacher->sections->pluck('id')->toArray()) && in_array($section->id,  $teacher->sections->pluck('id')->toArray()) ? 'selected' : '' }}>{{$teacher->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('section.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('section.update') }}</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- delete_modal_Grade -->
                                        <div class="modal fade"
                                             id="delete{{ $section->id }}"
                                             tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('section.delete_section') }}
                                                        </h5>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('sections.destroy', $section->id) }}"
                                                            method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                            {{ trans('section.warning_section') .' '. $section->name }}
                                                            <input id="id" type="hidden"
                                                                   name="id"
                                                                   class="form-control"
                                                                   value="{{ $section->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('section.close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('section.delete') }}</button>
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
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
                <!--add new section -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                    id="exampleModalLabel">
                                    {{ trans('section.add_section') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('sections.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="section_name_ar" class="form-control"
                                                   placeholder="{{ trans('section.section_name_ar') }}">
                                        </div>

                                        <div class="col">
                                            <input type="text" name="section_name_en" class="form-control"
                                                   placeholder="{{ trans('section.section_name_en') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="section_name_ku" class="form-control"
                                                   placeholder="{{ trans('section.section_name_ku') }}">
                                        </div>

                                    </div>
                                    <br>

                                    <br>

                                    <div class="col">
                                        <label for="inputName"
                                               class="control-label">{{ trans('section.name_class') }}</label>

                                        <select name="class_id"  class="custom-select">
                                            @foreach($class as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <br>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('section.teacher_name') }}</label>
                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('section.close') }}</button>
                                <button type="submit"
                                        class="btn btn-danger">{{ trans('section.submit') }}</button>
                            </div>
                            </form>


                        </div>
                        </div>
                    </div>
                </div>
    </div>
        </div>
@endsection
@section('js')

@endsection
