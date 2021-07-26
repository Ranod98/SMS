<?php


namespace App\Repository;


use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{

    public function index()
    {

        $receipt_students = ReceiptStudent::all();
        return view('dashboard.fees.receipts.index',compact('receipt_students'));



    }//end of index

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('dashboard.fees.receipts.show',compact('student'));
    }//end of show

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findorfail($id);
        return view('dashboard.fees.receipts.edit',compact('receipt_student'));


    }//end of edit

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $receipt_student = new  ReceiptStudent();
            $receipt_student->date = date('Y-m-d');
            $receipt_student->student_id = $request->student_id;
            $receipt_student->debit = $request->debit;
            $receipt_student->description = $request->description;
            $receipt_student->save();


            $fundAccount = new  FundAccount();
            $fundAccount->date = date('Y-m-d');
            $fundAccount->receipt_id = $receipt_student->id;
            $fundAccount->debit = $request->debit;
            $fundAccount->credit = 0.00;
            $fundAccount->description = $request->description;
            $fundAccount->save();


            $studentAccount = new StudentAccount();
            $studentAccount->date = date('Y-m-d');
            $studentAccount->type = 'receipt';
            $studentAccount->receipt_id = $receipt_student->id;
            $studentAccount->student_id = $request->student_id;
            $studentAccount->debit = 0.00;
            $studentAccount->credit = $request->debit;
            $studentAccount->description = $request->description;
            $studentAccount->save();

            DB::commit();
            toastr()->success(trans('message.success'));
            return redirect()->route('receiptStudents.index');

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try


    }//end of store

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            $receipt_students = ReceiptStudent::findorfail($id);
            $receipt_students->debit = $request->debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();


            $fund_accounts = FundAccount::where('receipt_id',$id)->first();
            $fund_accounts->debit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();


            $studentAccount = StudentAccount::where('receipt_id',$id)->first();
            $studentAccount->credit = $request->debit;
            $studentAccount->description = $request->description;
            $studentAccount->save();


            DB::commit();
            toastr()->success(trans('message.update'));
            return redirect()->route('receiptStudents.index');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            ReceiptStudent::destroy($id);
            toastr()->error(trans('message.delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }//end of destroy
}//end of class
