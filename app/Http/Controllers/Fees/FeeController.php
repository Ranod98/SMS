<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{

    protected $fees;

    public function __construct(FeeRepositoryInterface $fees)
    {

        $this->fees = $fees;
    }//end onf construct

    public function index()
    {
        return $this->fees->index();

    }//end of index


    public function create()
    {
        return $this->fees->create();
    }//END OF CREATE


    public function store(Request $request)
    {
        $request->validate([

            'amount' => 'required',
            'classroom_id' => 'required',
            'grade_id' => 'required',
            'year' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required',
            'title_ku' => 'required',
            'fee_type' => 'required',
        ]);
        return $this->fees->store($request);

    }//end of store


    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return $this->fees->edit($id);

    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->fees->update($request,$id);
    }//end of update


    public function destroy($id)
    {
        return $this->fees->destroy($id);

    }//end of destroy
}//end of controller
