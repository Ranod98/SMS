<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{

    protected $processingFee;

    public function __construct(ProcessingFeeRepositoryInterface  $processingFee)
    {
        $this->processingFee = $processingFee;
    }//end of cons

    public function index()
    {
        return $this->processingFee->index();
    }//end of index


    public function create()
    {
    }//end of create


    public function store(Request $request)
    {
        return $this->processingFee->store($request);
    }//end of store


    public function show($id)
    {
        return $this->processingFee->show($id);

    }//end of show

    public function edit($id)
    {
        return $this->processingFee->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->processingFee->update($request,$id);
    }//end of update


    public function destroy($id)
    {
        return $this->processingFee->destroy($id);

    }//end of destroy
}//end of controller
