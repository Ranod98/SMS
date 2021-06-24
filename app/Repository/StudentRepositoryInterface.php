<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    //Get Students

    public function getStudents();


    //show student

    public function showStudents($id);


    // Get Add Form Student
    public function createStudents();


    //Store_Student
    public function storeStudents($request);

    // Edit Students
    public function editStudents($id);

    //Destroy Student

    public function destroyStudents($id);

    //Update Students

    public function updateStudents($request,$id);

    // Get classrooms
    public function getClassrooms($id);

    //Get Sections
    public function getSections($id);

    //uploadAttachments
    public function uploadStudentAttachments($request,$id);

    //downloadAttachment

    public function downloadStudentAttachments($studentname , $filename);

    //deleteAttachment

    public function deleteAttachment($request);


}//end of interface
