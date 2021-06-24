@extends('layouts.master')
@section('css')

@section('title')
    @lang('main.classes')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">@lang('main.classes')</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="default-color">@lang('main.home')</a></li>
                    <li class="breadcrumb-item active">@lang('main.classes')</li>
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
                        @lang('class.add_class')
                    </button>

                        <button type="button" class="button  x-small" id="btn_delete_all">
                            @lang('class.delete_checkbox')
                        </button>

                    <br>

                        <form action="{{ route('class.filter_classes') }}" method="POST">
                            @csrf
                            <select class="nice-select" data-style="btn-info" name="grade_id" required
                                    onchange="this.form.submit()">
                                <option value="" selected disabled>{{ trans('class.search_by_grade') }}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                @endforeach
                            </select>
                        </form>
                        <br><br><br><br>
                    <div class="table-responsive">
                        @if (isset($details))
                            <?php $listClasses = $details ?>

                        @else
                            <?php $listClasses = $classrooms ?>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>@lang('class.class_name')</th>
                                <th>@lang('grades.grade')</th>
                                <th>@lang('grades.processes')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listClasses as $index => $classroom)
                                <tr>
                                    <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1" ></td>
                                    <td>{{$index+1000}}</td>
                                    <td>{{$classroom->name}}</td>
                                    <td>{{$classroom->grade->Name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $classroom->id }}"
                                                title="{{ trans('class.edit') }}"><i
                                                class="fa fa-edit"></i> @lang('class.edit')</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $classroom->id }}"
                                                title="{{ trans('class.delete') }}"><i
                                                class="fa fa-trash"></i> @lang('class.delete')</button>

                                    </td>
                                </tr>

                                {{--                            edit                            --}}
                                <div class="modal fade" id="edit{{$classroom->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('class.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{route('classrooms.update',$classroom->id)}}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">@lang('class.name_class_ar'):</label>
                                                            <input id="Name" type="text" name="name_ar" class="form-control" required value="{{$classroom->getTranslation('name','ar')}}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">@lang('class.name_class_en'):</label>
                                                            <input type="text" class="form-control" name="name_en" required value="{{$classroom->getTranslation('name','en')}}">
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name_ku" class="mr-sm-2">@lang('class.name_class_ku'):</label>
                                                            <input type="text" class="form-control" name="name_ku" required value="{{$classroom->getTranslation('name','ku')}}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('class.name_grade') }}
                                                                :</label>

                                                            <div class="box">
                                                                <select class="fancyselect" name="Grade_id">
                                                                    @foreach ($grades as $Grade)
                                                                        <option value="{{ $Grade->id }}" {{$Grade->id == $classroom->grade->id ? 'selected' : ''}}>{{ $Grade->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
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
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('class.delete_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('classrooms.destroy',$classroom->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    {{ trans('class.confirm_delete') }}
                                                    <input id="id" type="text" name="id" class="form-control "
                                                           value="{{ $classroom->name }}" disabled>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('class.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('class.delete') }}</button>
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






        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5  class="modal-title" id="exampleModalLabel">
                            {{ trans('class.add_class') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="class_list">
                                        <div data-repeater-item>

                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ trans('class.name_class_ar') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="name_ar" required />
                                                </div>


                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ trans('class.name_class_en') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="name_en" required />
                                                </div>

                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ trans('class.name_class_ku') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="name_ku" required />
                                                </div>


                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('class.name_grade') }}
                                                        :</label>

                                                    <div class="box">
                                                        <select class="fancyselect" name="Grade_id">
                                                            @foreach ($grades as $Grade)
                                                                <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('class.Processes') }}
                                                        :</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                                           type="button" value="{{ trans('class.delete_row') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('class.add_row') }}"/>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ trans('grades.close') }}</button>
                                        <button type="submit"
                                                class="btn btn-success">{{ trans('grades.save') }}</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>



        </div>

        <!-- حذف مجموعة صفوف -->
        <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('class.delete_class') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{route('class.delete_all')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{ trans('class.warning_grade') }}
                            <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('class.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('class.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

@endsection
