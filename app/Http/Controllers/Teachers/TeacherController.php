<?php

namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\Controller;
use App\Repository\TeacherRepositoryInterface;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
        protected $teacherRepository;
        public function __construct(TeacherRepositoryInterface $teacherRepository)
        {
            $this->teacherRepository = $teacherRepository;
        }//end of construct

    public function index()
    {

        $teachers =  $this->teacherRepository->getTeachers();
        $specializations = $this->teacherRepository->getSpecializations();
        $genders = $this->teacherRepository->getGenders();


        return view('dashboard.teachers.index',compact('teachers','specializations','genders'));

    }//end of index

    public function create()
    {

        $specializations = $this->teacherRepository->getSpecializations();
        $genders = $this->teacherRepository->getGenders();

      return  view('dashboard.teachers.create',compact('genders','specializations'));

    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:teachers',
            'name_ar' =>'required',
            'name_en' =>'required',
            'name_ku' =>'required',
            'password' => 'required',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'joining_date' => 'required',
            'address' => 'required'
        ]);

        return $this->teacherRepository->storeTeachers($request);

    }//end of store


    public function show($id)
    {

    }//end of show


    public function edit($id)
    {


        $teacher = $this->teacherRepository->editTeachers($id);

        $specializations = $this->teacherRepository->getSpecializations();
        $genders = $this->teacherRepository->getGenders();

        return view('dashboard.teachers.edit',compact('teacher','specializations','genders'));

    }//end of edit


    public function update(Request $request ,$id)
    {
        $request->validate([
            'email' => 'required',
            'name_ar' =>'required',
            'name_en' =>'required',
            'name_ku' =>'required',
            'password' => 'required',
            'specialization_id' => 'required',
            'gender_id' => 'required',
            'joining_date' => 'required',
            'address' => 'required'
        ]);

        return $this->teacherRepository->updateTeacher($request,$id);


    }//end of update


    public function destroy($id)
    {

        return $this->teacherRepository->destroyTeachers($id);

    }//end of destroy

}//end of contoller

?>
