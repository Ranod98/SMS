<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduatedRepository;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{

    protected $graduated;

    public function __construct(StudentGraduatedRepository $graduated)
    {


        $this->graduated = $graduated;


    }//end of construct

    public function index()
    {
        return $this->graduated->index();
    }//end of index


    public function create()
    {
        return $this->graduated->create();
    }//end of create


    public function store(Request $request)
    {


       return $this->graduated->softDelete($request);

    }//end of store

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update($id)
    {
        return $this->graduated->rollBack($id);

    }//end of update


    public function destroy($id)
    {
        return $this->graduated->destroy($id);

    }//end of destroy

}//end of controller
