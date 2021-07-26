<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$processingFee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">@lang('fees.delete_processing_fee')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('processingFees.destroy',$processingFee->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <h5 style="font-family: 'Cairo', sans-serif;">@lang('fees.confirm_delete_processing_fee')</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students.close')}}</button>
                        <button  class="btn btn-danger">{{trans('students.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
