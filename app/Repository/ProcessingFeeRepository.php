<?php


namespace App\Repository;


use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{

    public function index()
    {

        $processingFees = ProcessingFee::all();

        return view('dashboard.fees.processing.index',compact('processingFees'));
    }//end of index

    public function show($id)
    {
        $student = Student::findOrFail($id);
      return view('dashboard.fees.processing.show',compact('student'));

    }//end of show

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $processingFee = new  ProcessingFee();

            $processingFee->date = date('Y-m-d');
            $processingFee->student_id = $request->student_id;
            $processingFee->amount = $request->debit;
            $processingFee->description = $request->description;

            $processingFee->save();


            $studentAccount = new StudentAccount();
            $studentAccount->date = date('Y-m-d');
            $studentAccount->type = 'ProcessingFee';
            $studentAccount->student_id = $request->student_id;
            $studentAccount->processing_fee_id = $processingFee->id;
            $studentAccount->Debit = 0.00;
            $studentAccount->credit = $request->debit;
            $studentAccount->description = $request->description;

            $studentAccount->save();

            DB::commit();
            toastr()->success(trans('message.success'));
            return redirect()->route('processingFees.index');

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try catch
    }//end of store

    public function edit($id)
    {
        $processingFee = ProcessingFee::findOrFail($id);


        return view('dashboard.fees.processing.edit',compact('processingFee'));

    }//end of edit

    public function update($request, $id)
    {


        DB::beginTransaction();

        try {

            $processingFee = ProcessingFee::findOrFail($id);

            $processingFee->date = date('Y-m-d');
            $processingFee->amount = $request->debit;
            $processingFee->description = $request->description;

            $processingFee->save();


            $studentAccount = StudentAccount::where('processing_fee_id',$id)->first();;
            $studentAccount->date = date('Y-m-d');
            $studentAccount->credit = $request->debit;
            $studentAccount->description = $request->description;

            $studentAccount->save();

            DB::commit();
            toastr()->success(trans('message.update'));
            return redirect()->route('processingFees.index');

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try catch
    }//end of update

    public function destroy($id)
    {
        try {
            ProcessingFee::destroy($id);
            toastr()->error(trans('messages.delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//end of try
}//end of class
