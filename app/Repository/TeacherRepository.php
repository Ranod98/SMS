<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getTeachers()
    {
        return Teacher::paginate(5);

    }//end of get Teachers


    public function storeTeachers($request)
    {

        try {
            $teacher = new Teacher();

            $teacher->email = $request->email;
            $teacher->password =  Hash::make($request->password);
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku'=>$request->name_ku];
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;

            $teacher->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('teachers.index');
        }catch (\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);

        }//end of try catch

    }//end of store teachers

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);

    }//end of edit teacher



    public function updateTeacher($request, $id)
    {
        try {

            $teacher = Teacher::findOrFail($id);
            $teacher->email = $request->email;
            $teacher->password =  Hash::make($request->password);
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku'=>$request->name_ku];
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;

            $teacher->save();

            toastr()->success(trans('messages.update'));
            return redirect()->route('teachers.index');

        }catch (\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }//end of try and catch


    }//end of update teacher

    public function destroyTeachers($id)
    {
        Teacher::findOrFail($id)->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('teachers.index');
    }//end of destroyTeachers

    public function getSpecializations()
    {
        return Specialization::all();
    }//end of get Specializations

    public function getGenders()
    {
        return Gender::all();
    }//end of het genders


}//end of class
