<?php


namespace App\Repository;


use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class PaymentStudentRepository implements PaymentStudentRepositoryInterface
{

    public function index()
    {

        $payments = PaymentStudent::all();

        return view('dashboard.fees.paymentStudents.index',compact('payments'));

    }//end of index

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('dashboard.fees.paymentStudents.show',compact('student'));
    }//end of show

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $payment_students = new PaymentStudent();
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = $request->student_id;
            $payment_students->amount = $request->debit;
            $payment_students->description = $request->description;
            $payment_students->save();



            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_student_id = $payment_students->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            $students_accounts = new StudentAccount();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'payment';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->payment_student_id = $payment_students->id;
            $students_accounts->debit = $request->debit;
            $students_accounts->credit = 0.00;
            $students_accounts->description = $request->description;
            $students_accounts->save();



            DB::commit();
            toastr()->success(trans('message.success'));
            return redirect()->route('paymentStudents.index');

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try

    }//end of store

    public function edit($id)
    {
        $payment_student = PaymentStudent::findOrFail($id);

        return view('dashboard.fees.paymentStudents.edit',compact('payment_student'));


    }//end of edit

    public function update($request, $id)
    {

        DB::beginTransaction();


        try {

            $payment_students = PaymentStudent::findorfail($id);
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = $request->student_id;
            $payment_students->amount = $request->debit;
            $payment_students->description = $request->description;
            $payment_students->save();


            $fund_accounts = FundAccount::where('payment_student_id',$id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_student_id = $payment_students->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            $students_accounts = StudentAccount::where('payment_student_id',$id)->first();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'payment';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->payment_student_id = $payment_students->id;
            $students_accounts->debit = $request->debit;
            $students_accounts->credit = 0.00;
            $students_accounts->description = $request->description;
            $students_accounts->save();

            DB::commit();
            toastr()->success(trans('message.update'));
            return redirect()->route('paymentStudents.index');

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try
    }//emd of update

    public function destroy($id)
    {
        try {
            PaymentStudent::destroy($id);
            toastr()->error(trans('message.delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
