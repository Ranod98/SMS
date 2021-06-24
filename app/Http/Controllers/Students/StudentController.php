<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    protected $students;

    public function __construct(StudentRepositoryInterface  $students)
    {
        $this->students = $students;

    }//end of construct

    public function index()
    {
        return $this->students->getStudents();

    }//end of index


    public function create()
    {
        return $this->students->createStudents();

    }//end of create


    public function store(Request $request)
    {

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_ku' => 'required',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6|max:10',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ]);

       return $this->students->storeStudents($request);
    }//end of store


    public function show($id)
    {

        return $this->students->showStudents($id);

    }//end of show


    public function edit($id)
    {
        return $this->students->editStudents($id);

    }//end of edit


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'name_ku' => 'required',
            'email'=>['required',Rule::unique('students')->ignore($id),'email'],
            'password' => 'required|string|min:6|max:300',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ]);

        return $this->students->updateStudents($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->students->destroyStudents($id);

    }//end of destroy

    public function getClassrooms($id)
    {
        return $this->students->getClassrooms($id);

    }//end of get class room

    public function getSections($id)
    {
        return $this->students->getSections($id);

    }//end of get class room

    public function uploadAttachments(Request $request,$id){

        return $this->students->uploadStudentAttachments($request,$id);


    }//end of uploadAttachments


    public function downloadAttachment($studentname , $filename){

        return $this->students->downloadStudentAttachments($studentname , $filename);
    }//end downloadAttachment

    public function deleteAttachment(Request  $request){



        return $this->students->deleteAttachment($request);

    }//end deleteAttachment


}//end of controller
