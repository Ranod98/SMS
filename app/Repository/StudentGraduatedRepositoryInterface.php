<?php


namespace App\Repository;


interface StudentGraduatedRepositoryInterface
{

    public function index();

    public function create();

    //update student to softdelete
    public function softDelete($request);

    //roll back student form soft delete
    public function rollBack($id);

    //force delete student
    public function destroy($id);

}//end of interface
