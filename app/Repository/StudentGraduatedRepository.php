<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('dashboard.students.graduated.index',compact('students'));

    }//end of index

    public function create()
    {

        $grades = Grade::all();
        return view('dashboard.students.graduated.create',compact('grades'));

    }//end of create

    public function softDelete($request)
    {
        DB::beginTransaction();
        try {

            if ($request->page_id == 2) {

                $student = Student::findOrFail($request->student_id);
                $promotion = Promotion::where('student_id',$request->student_id)->delete();
                $student->delete();

                DB::commit();
                toastr()->success(trans('message.success'));
                return redirect()->route('promotions.index');

            }else{

                $students = Student::where('grade_id',$request->grade_id)
                    ->where('class_id',$request->class_id)
                    ->where('section_id',$request->section_id)
                    ->get();


                if ($students->count() == 0) {

                    return redirect()->back()->with('error_graduated', __('error'));
                }//end of if


                foreach ($students as $student){

                    $ids = explode(',',$student->id);



                    $studentt = Student::whereIn('id',$ids);
                    $promotions = Promotion::where('student_id',$student->id)->delete();

                    $studentt->delete();


                }//end of foreach

                DB::commit();
                toastr()->success(trans('message.success'));
                return redirect()->route('graduated.index');
            }//end of if




        }catch (\Exception $e){

            return redirect()->back()->withErrors(['error_graduated' => $e->getMessage()]);
        }//end of catch

    }//end of store

    public function rollBack($id)
    {
        DB::rollback();
        Student::onlyTrashed()->where('id', $id)->first()->restore();

        toastr()->success(trans('message.success'));
        return redirect()->route('graduated.index');
    }//end of roll back

    public function destroy($id)
    {

        Student::onlyTrashed()->where('id', $id)->first()->forceDelete();

        toastr()->error(trans('message.delete'));
        return redirect()->back();
    }//end of destroy


}//end of class
