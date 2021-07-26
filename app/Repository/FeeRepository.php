<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\Grade;

class FeeRepository implements FeeRepositoryInterface
{

    public function index()
    {
        $fees = Fee::all();


        return view('dashboard.fees.index',compact('fees'));

    }//end of index

    public function create()
    {
        $grades = Grade::all();

        return view('dashboard.fees.create',compact('grades'));
    }//END OF create

    public function store($request)
    {
        try {

            $fee = new Fee();

            $fee->title = ['en' => $request->title_en, 'ar' => $request->title_ar,'ku' => $request->title_ku];

            $fee->amount =  $request->amount;
            $fee->grade_id = $request->grade_id ;
            $fee->classroom_id =$request->classroom_id ;
            $fee->year = $request->year;
            $fee->description = $request->description;
            $fee->fee_type = $request->fee_type;

            $fee->save();


            toastr()->success(trans('message.success'));

            return redirect()->route('fees.index');



        }catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

        }//end of try

    }//end of store

    public function edit($id)
    {
       $grades = Grade::all();

       $fee = Fee::findOrFail($id);

       return view('dashboard.fees.edit',compact('grades','fee'));

    }//end of delete

    public function update($request,$id)
    {

        try {
            $fee = Fee::findOrFail($id);
            $fee->title = ['en' => $request->title_en, 'ar' => $request->title_ar,'ku' => $request->title_ku];

            $fee->amount =  $request->amount;
            $fee->grade_id = $request->grade_id ;
            $fee->classroom_id =$request->classroom_id ;
            $fee->year = $request->year;
            $fee->description = $request->description;
            $fee->fee_type = $request->fee_type;

            $fee->save();


            toastr()->success(trans('message.update'));
            return redirect()->route('fees.index');
        }catch (\Exception $e){

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

        }//END OF TRY



    }//end of update-

    public function destroy($id)
    {
        try {

            $fee = Fee::findOrFail($id)->delete();
            toastr()->error(trans('message.delete'));

            return redirect()->route('fees.index');
        }catch (\Exception $e){


            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);

        }//end of try

    }//end of destroy
}//end of class
