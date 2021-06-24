<?php
namespace App\Repository;

interface TeacherRepositoryInterface{

    public function getTeachers();

    public function storeTeachers($request);

    public function destroyTeachers($id);

    public function editTeachers($id);

    public function updateTeacher($request,$id);




    public function getSpecializations();

    public function getGenders();


}//end if interface
