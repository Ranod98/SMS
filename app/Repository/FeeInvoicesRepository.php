<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{

    public function index()
    {

        $feeInvoices = FeeInvoice::all();

        return view('dashboard.fees.invoices.index',compact('feeInvoices'));

    }//end of index

    public function show($id)
    {

        $student = Student::findOrFail($id);
        $fees = Fee::where('classroom_id',$student->class_id)->get();

        return view('dashboard.fees.invoices.show',compact('student','fees'));
    }//end of show

    public function store($request)
    {

        try {

            $feesList = $request->feesList;
            DB::beginTransaction();

            foreach ($feesList as $feeList){

                $fee = new FeeInvoice();
                $fee->invoice_date = date('Y-m-d');
                $fee->student_id = $request->student_id;
                $fee->grade_id = $request->grade_id;
                $fee->class_id = $request->classroom_id;
                $fee->fee_id = $feeList['fee_id'];
                $fee->description =$feeList['description'];
                $amount = Fee::findOrFail($feeList['fee_id']);
                $fee->amount = $amount->amount;

                $fee->save();



                $studentAccount = new StudentAccount();

                $studentAccount->date = date('Y-m-d');
                $studentAccount->type = 'invoice';
                $studentAccount->fee_invoice_id = $fee->id;
                $studentAccount->student_id = $request->student_id;
                $studentAccount->debit = $amount->amount;
                $studentAccount->credit = 0.00;
                $studentAccount->description = $feeList['description'];

                $studentAccount->save();


        }//end of foreach

            DB::commit();

            toastr()->success(trans('message.success'));
            return redirect()->route('feesInvoices.index');
        }catch (\Exception $e){

            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end of try



    }//end store

    public function edit($id)
    {
        $feeInvoice = FeeInvoice::findOrFail($id);
        $fees = Fee::where('classroom_id',$feeInvoice->class_id)->get();

        return view('dashboard.fees.invoices.edit',compact('feeInvoice','fees'));
    }//end of edit

    public function update($request, $id)
    {

        DB::beginTransaction();

        try {

            $feeInvoice = FeeInvoice::findOrFail($id);
            $feeInvoice->fee_id = $request->fee_id;
            $feeInvoice->amount = $request->amount;
            $feeInvoice->description = $request->description;

            $feeInvoice->save();


            $studentAccount = StudentAccount::where('fee_invoice_id',$id)->first();

            $studentAccount->debit = $request->amount;
            $studentAccount->description = $request->description;

            $studentAccount->save();

            DB::commit();

            toastr()->success(trans('message.success'));
            return redirect()->route('feesInvoices.index');

        }catch (\Exception $e){

            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try

    }//end of update

    public function destroy($id)
    {
        try {

            FeeInvoice::destroy($id);

            toastr()->error(trans('message.delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//end of destroy
}//end of class
