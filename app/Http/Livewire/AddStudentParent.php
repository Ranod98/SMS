<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddStudentParent extends Component
{
    use WithFileUploads;
    public  $currentStep = 1;

    public $successMessage;
    public $catchError,$updateMode=false,$show_table = true;

    public $email,$password,$father_name_ar,$father_name_en,$father_name_ku,
    $father_job_ar,$father_job_en,$father_job_ku,$father_national_id,
    $father_passport_id,$father_phone,$nationality_id_father,$blood_type_id_father,
    $religion_id_father,$father_address,$mother_name_ar,$mother_name_en,$mother_name_ku,
        $mother_job_ar,$mother_job_en,$mother_job_ku,$mother_national_id,
        $mother_passport_id,$mother_phone,$nationality_id_mother,$blood_type_id_mother,
        $religion_id_mother,$mother_address,$photos,$parent_id
    ;
    public function render()
    {

        return view('livewire.add-student-parent',[
            'nationalities' => Nationality::all(),
            'type_bloods' => BloodType::all(),
            'religions' => Religion::all(),
            'parentStudents' => StudentParent::all(),
        ]);


    }//end of render

    public function showFormAdd(){
        $this->show_table = false;
    }//end of show form add



    public function submitForm(){

        try {
            $student_parent = new  StudentParent();
            $student_parent['email'] = $this->email;
            $student_parent['password'] = Hash::make($this->password);
            $student_parent['father_name'] =['en' => $this->father_name_en, 'ar' => $this->father_name_ar,'ku' => $this->father_name_ku];

            $student_parent['father_job'] = ['en' => $this->father_job_en, 'ar' => $this->father_job_ar,'ku' => $this->father_job_ku];
            $student_parent['father_national_id'] = $this->father_national_id;
            $student_parent['father_passport_id'] = $this->father_passport_id;
            $student_parent['father_phone'] = $this->father_phone;
            $student_parent['nationality_id_father'] =$this->nationality_id_father ;
            $student_parent['blood_type_id_father'] =$this->blood_type_id_father ;
            $student_parent['religion_id_father'] =$this->religion_id_father ;
            $student_parent['father_address'] =$this->father_address ;

            $student_parent['mother_name'] =['en' => $this->mother_name_en, 'ar' => $this->mother_name_ar,'ku' => $this->mother_name_ku];
            $student_parent['mother_job'] = ['en' => $this->mother_job_en, 'ar' => $this->mother_job_ar,'ku' => $this->mother_job_ku];

            $student_parent['mother_national_id'] =$this->mother_national_id ;
            $student_parent['mother_passport_id'] =$this->mother_passport_id ;
            $student_parent['mother_phone'] =$this->mother_phone ;
            $student_parent['nationality_id_mother'] =$this->nationality_id_mother ;
            $student_parent['blood_type_id_mother'] =$this->blood_type_id_mother ;
            $student_parent['religion_id_mother'] =$this->religion_id_mother ;
            $student_parent['mother_address'] =$this->mother_address ;


            $student_parent->save();


            if (!empty($this->photos)) {

                foreach ($this->photos as $photo){

                    $photo->storeAs($this->nationality_id_father , $photo->getClientOriginalName(),$disk ='parent_attachments');
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => $student_parent->id
                    ]);
                }//end of foreach to save img

            }//end of if to uploading img

            $this->successMessage = trans('success');
            $this->clearForm();
            $this->currentStep = 1;
        }catch (\Exception $e){
            $this->catchError = $e->getMessage();


        }//end of try catch


    }//end of submit form


    public function delete($id){

       $parent =  StudentParent::findOrFail($id)->delete();

        return redirect()->route('add_parent');
    }//end of delete


    //firstStepSubmit

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $studentParent = StudentParent::where('id',$id)->first();
        $this->parent_id = $id;
        $this->email = $studentParent->email;
        $this->password = $studentParent->password;
        $this->father_name_ar = $studentParent->getTranslation('father_name', 'ar');
        $this->father_name_en = $studentParent->getTranslation('father_name', 'en');
        $this->father_name_ku = $studentParent->getTranslation('father_name', 'ky');
        $this->father_job_ar = $studentParent->getTranslation('father_job', 'ar');;
        $this->father_job_en = $studentParent->getTranslation('father_job', 'en');
        $this->father_job_ku = $studentParent->getTranslation('father_job', 'ku');
        $this->father_national_id =$studentParent->father_national_id;
        $this->father_passport_id = $studentParent->father_passport_id;
        $this->father_phone = $studentParent->father_phone;
        $this->nationality_id_father = $studentParent->nationality_id_father;
        $this->blood_type_id_father = $studentParent->blood_type_id_father;
        $this->father_address =$studentParent->father_address;
        $this->religion_id_father =$studentParent->religion_id_father;

        $this->mother_name_ar = $studentParent->getTranslation('mother_name', 'ar');
        $this->mother_name_en = $studentParent->getTranslation('mother_name', 'en');
        $this->mother_name_ku = $studentParent->getTranslation('mother_name', 'ku');
        $this->mother_job_ar = $studentParent->getTranslation('mother_job', 'ar');;
        $this->mother_job_en = $studentParent->getTranslation('mother_job', 'en');
        $this->mother_job_ku = $studentParent->getTranslation('mother_job', 'ku');
        $this->mother_national_id =$studentParent->mother_national_id;
        $this->mother_passport_id = $studentParent->mother_passport_id;
        $this->mother_phone = $studentParent->mother_phone;
        $this->nationality_id_mother = $studentParent->nationality_id_mother;
        $this->blood_type_id_mother = $studentParent->blood_type_id_mother;
        $this->mother_address =$studentParent->mother_address;
        $this->religion_id_mother =$studentParent->religion_id_mother;
    }//end of edit

    //firstStepSubmit
    public function firstStepSubmitEdit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmitEdit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitFormEdit(){

        if ($this->parent_id){
            $parent = StudentParent::find($this->parent_id);
            $parent->update([
            'email' => $this->email
            ]);

        }

        return redirect()->route('add_parent');
    }




    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:student_parents,email,'.$this->id,
            'password' => 'required',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'father_name_ku' => 'required',
            'father_job_ar' => 'required',
            'father_job_en' => 'required',
            'father_job_ku' => 'required',
            'father_national_id' => 'required|unique:student_parents,father_national_id,' . $this->id,
            'father_passport_id' => 'required|unique:student_parents,father_passport_id,' . $this->id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_id_father' => 'required',
            'blood_type_id_father' => 'required',
            'religion_id_father' => 'required',
            'father_address' => 'required',
        ]);

        $this->currentStep = 2;
    }//end of first step

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'mother_name_ku' => 'required',
            'mother_job_ar' => 'required',
            'mother_job_en' => 'required',
            'mother_job_ku' => 'required',
            'mother_national_id' => 'required|unique:student_parents,mother_national_id,' . $this->id,
            'mother_passport_id' => 'required|unique:student_parents,mother_passport_id,' . $this->id,
            'mother_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_id_mother' => 'required',
            'blood_type_id_mother' => 'required',
            'religion_id_mother' => 'required',
            'mother_address' => 'required',
        ]);
        $this->currentStep = 3;
    }//end of second  step

    public function back($step)
    {
        $this->currentStep = $step;
    }//end of step back

    public function clearForm(){
        $this->email = '';
        $this->password = '';
        $this->father_name_ar = '';
        $this->father_name_en = '';
        $this->father_name_ku = '';
        $this->father_job_ar = '';
        $this->father_job_en ='';
        $this->father_job_ku = '';
        $this->father_national_id = '';
        $this->father_passport_id = '';
        $this->father_phone = '';
        $this->nationality_id_father ='';
        $this->blood_type_id_father ='';
        $this->religion_id_father ='';
        $this->father_address ='';


        $this->mother_name_ar ='';
        $this->mother_name_en ='';
        $this->mother_name_ku = '';
        $this->mother_job_ar = '';
        $this->mother_job_en = '';
        $this->mother_job_ku = '';
        $this->mother_national_id ='';
        $this->mother_passport_id = '';
        $this->mother_phone = '';
        $this->nationality_id_mother = '';
        $this->blood_type_id_mother = '';
        $this->religion_id_mother ='';
        $this->mother_address ='';
        $this->photos ='';
    }//end of clear form

}//end of addstudentparent
