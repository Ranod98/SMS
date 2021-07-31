<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    protected $subject;
    public function __construct(SubjectRepositoryInterface  $subject)
    {
        return $this->subject = $subject;
    }

    public function index()
    {
        return $this->subject->index();
    }//end of index


    public function create()
    {
        return $this->subject->create();
    }//end of create


    public function store(Request $request)
    {
        return $this->subject->store($request);
    }//end of store


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->subject->edit($id);
    }//end of edit

    public function update(Request $request, $id)
    {
        return $this->subject->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->subject->destroy($id);

    }//end of destroy
}
