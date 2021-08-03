<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Repository\ExamRepositoryInterface;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    protected $exam;
    public function __construct(ExamRepositoryInterface $exam)
    {
        return $this->exam = $exam;
    }

    public function index()
    {
        return $this->exam->index();
    }//end of index


    public function create()
    {
        return $this->exam->create();
    }//end of create


    public function store(Request $request)
    {
        return $this->exam->store($request);
    }//end of store


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->exam->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->exam->update($request,$id);
    }//end of update


    public function destroy($id)
    {
        return $this->exam->destroy($id);
    }//end of destroy
}
