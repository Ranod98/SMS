<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{

    protected $receiptStudents;
    public function __construct(ReceiptStudentsRepositoryInterface $receiptStudents)
    {

        $this->receiptStudents = $receiptStudents;


    }//end of const

    public function index()
    {
        return $this->receiptStudents->index();
    }//end of index


    public function create()
    {
        //
    }//end of create


    public function store(Request $request)
    {
        return $this->receiptStudents->store($request);

    }//end of store


    public function show($id)
    {
        return $this->receiptStudents->show($id);

    }//end of show


    public function edit($id)
    {
        return $this->receiptStudents->edit($id);

    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->receiptStudents->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->receiptStudents->destroy($id);

    }//end of destroy
}//end of controller
