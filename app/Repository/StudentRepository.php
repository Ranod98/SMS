<?php


namespace App\Repository;


use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements  StudentRepositoryInterface
{

    public function getStudents()
    {

        $students = Student::all();

        return view('dashboard.students.index',compact('students'));

    }//end of get students

    public function showStudents($id){

        $student = Student::findOrFail($id);

        return view('dashboard.students.show',compact('student'));

    }//end of showStudents

    public function createStudents()
    {

        $data['grades'] = Grade::all();
        $data['parents'] = StudentParent::all();
        $data['genders']= Gender::all();
        $data['nationals'] = Nationality::all();
        $data['bloods'] = BloodType::all();

        return view('dashboard.students.create',$data);

    }//end create Student

    public function storeStudents($request)
    {
        DB::beginTransaction();

        try {
            $student = new Student();

            $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku' => $request->name_ku];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationalitie_id = $request->nationalitie_id;
            $student->blood_id = $request->blood_id;
            $student->birth_date = $request->birth_date;
            $student->grade_id = $request->grade_id;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->parent_id = $request->parent_id;
            $student->academic_year = $request->academic_year;

            $student->save();

            if ($request->hasfile('photos')) {

                foreach ($request->file('photos') as $file){

                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$student->getTranslation('name','en'), $file->getClientOriginalName(),'upload_attachments');

                    $image = new  Image();
                    $image->filename=$name;
                    $image->imageable_id= $student->id;
                    $image->imageable_type = 'App\Models\Student';
                    $image->save();


                }//end for each

            }//end of store image




            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('students.index');


        }catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end of try catch

    }//end storeStudents

    public function editStudents($id)
    {
        $data['student'] = Student::findOrFail($id);
        $data['grades'] = Grade::all();
        $data['parents'] = StudentParent::all();
        $data['genders']= Gender::all();
        $data['nationals'] = Nationality::all();
        $data['bloods'] = BloodType::all();


        return view('dashboard.students.edit',$data);

    }//end create Student

    public function updateStudents($request, $id)
    {

        try {

            $student = Student::findOrFail($id);

            $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar,'ku' => $request->name_ku];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationalitie_id = $request->nationalitie_id;
            $student->blood_id = $request->blood_id;
            $student->birth_date = $request->birth_date;
            $student->grade_id = $request->grade_id;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->parent_id = $request->parent_id;
            $student->academic_year = $request->academic_year;
            $student->save();

            toastr()->success(trans('message.update'));

            return redirect()->route('students.index');

        }catch (\Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end of try catch



    }//end of update students


    public function destroyStudents($id){

        $student = Student::findOrFail($id)->delete();

        toastr()->error(trans('message.delete'));
        return redirect()->route('students.index');

    }//end of destroy students



    public function uploadStudentAttachments($request,$id){

        $student = Student::findOrFail($id);



        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$student->getTranslation('name','en'), $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new Image();
            $images->filename=$name;
            $images->imageable_id = $student->id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('message.success'));
        return redirect()->route('students.show',$student->id);


    }//end of upload student attachment


    public function downloadStudentAttachments($studentname , $filename)
    {

        return response()->download(public_path('attachments/students/'.$studentname.'/'.$filename));

    }//end downloadStudentAttachments

    public function deleteAttachment($request)
    {
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('message.delete'));
        return redirect()->route('students.show',$request->student_id);

    }//deleteAttachment


    public function getClassrooms($id)
    {

        $classList = Classroom::where('Grade_id',$id)->pluck('name','id');

        return $classList;

    }//end getClassrooms

    public function getSections($id)
    {
        $sectionList = Section::where('class_id',$id)->pluck('name', 'id');

        return $sectionList;
    }//end getSections



}//end of class
