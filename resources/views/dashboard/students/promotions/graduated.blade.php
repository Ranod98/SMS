<div class="modal fade" id="Return_Student{{$promotion->student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">@lang('students.graduate')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('graduated.store',$promotion->student->id)}}" method="post" autocomplete="off">
                    @method('post')
                    @csrf

                    <input type="hidden"  name= "student_id" value="{{$promotion->student->id}}" class="form-control">
                    <input type="hidden"  name= "page_id" value="2" class="form-control">
                    <h5 style="font-family: 'Cairo', sans-serif;">@lang('students.graduate')</h5>
                    <input type="text" readonly value="{{$promotion->student->name}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students.close')}}</button>
                        <button  class="btn btn-danger">{{trans('students.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
