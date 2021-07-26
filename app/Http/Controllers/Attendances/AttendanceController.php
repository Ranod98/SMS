<?php

namespace App\Http\Controllers\Attendances;

use App\Http\Controllers\Controller;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    protected $attendance;
   public function __construct(AttendanceRepositoryInterface $attendance)
   {

       $this->attendance = $attendance;

   }//end of cons

    public function index()
    {
        return $this->attendance->index();
    }//end of index


    public function create()
    {

    }//end of create

    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }//end of show


    public function show($id)
    {
        return $this->attendance->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->attendance->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->attendance->update($request,$id);
    }


    public function destroy($id)
    {
        return $this->attendance->destroy($id);
    }//end of destroy
}//end of controller
