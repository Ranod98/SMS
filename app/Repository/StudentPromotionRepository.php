<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{


    public function getPromotions()
    {

        $grades = Grade::all();

        return view('dashboard.students.promotions.index',compact('grades'));

    }//end of get Promotion

    public function storePromotions($request)
    {
        DB::beginTransaction();

        try {

            $students = Student::where('grade_id',$request->grade_id)
                ->where('class_id',$request->class_id)
                ->where('section_id',$request->section_id)
                ->where('academic_year',$request->from_year)
                ->get();
//            dd($students);
//            dd($students->count());
            if ($students->count() < 1) {

                return redirect()->back()->with('error', __('error'));
            }//end of if




            foreach ($students as $student){

                $ids = explode(',',$student->id);

                Student::whereIn('id', $ids)
                    ->update([
                        'grade_id'=>$request->grade_id_new,
                        'class_id'=>$request->class_id_new,
                        'section_id'=>$request->section_id_new,
                        'academic_year'=>$request->to_year
                    ]);


                Promotion::updateOrCreate([
                    'student_id'=>$student->id,
                    'from_grade'=>$request->grade_id,
                    'from_classroom'=>$request->class_id,
                    'from_section'=>$request->section_id,
                    'from_year'=>$request->from_year,
                    'to_grade'=>$request->grade_id_new,
                    'to_classroom'=>$request->class_id_new,
                    'to_section'=>$request->section_id_new,
                    'to_year'=>$request->to_year,
                ]);



            }//end of foreach


            DB::commit();
            toastr()->success(trans('message.delete'));
            return redirect()->back();


        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }//end of storePromotions


    public function managePromotions()
    {

        $promotions = Promotion::all();

        return view('dashboard.students.promotions.manage',compact('promotions'));


    }//end of managePromotions

    public  function destroyPromotions($request)
    {
        DB::beginTransaction();

        try {

           if ($request->page_id == 1) {

               $promotions = Promotion::all();

               foreach ($promotions as $promotion){

                   $ids = explode(',',$promotion->student_id);

                   Student::whereIn('id', $ids)
                       ->update([
                           'grade_id'=>$promotion->from_grade,
                           'class_id'=>$promotion->from_classroom,
                           'section_id'=>$promotion->from_section,
                           'academic_year'=>$promotion->from_year
                       ]);

               }//end for each

               Promotion::truncate();
               DB::commit();
               toastr()->success(trans('message.delete'));
               return redirect()->back();
            //destroy all promotions
           }else{

               $promotion = Promotion::findOrFail($request->id);

               Student::where('id', $promotion->student_id)
                   ->update([
                       'grade_id'=>$promotion->from_grade,
                       'class_id'=>$promotion->from_classroom,
                       'section_id'=>$promotion->from_section,
                       'academic_year'=>$promotion->from_year
                   ]);

               Promotion::destroy($request->id);

               DB::commit();
               toastr()->error(trans('message.delete'));
               return redirect()->back();


               //delete selected promotion
           }//end of if

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }//end of try catch

    }//end destroyPromotions


}//end of class
