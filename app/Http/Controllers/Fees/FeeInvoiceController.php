<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeeInvoiceController extends Controller
{

    protected $feeInvoice;
    public function __construct(FeeInvoicesRepositoryInterface $feeInvoice)
    {
        $this->feeInvoice = $feeInvoice;

    }//end of con

    public function index()
    {

        return $this->feeInvoice->index();


    }//end of index


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->feeInvoice->store($request);
    }//end of store


    public function show($id)
    {

        return $this->feeInvoice->show($id);

    }//end of show


    public function edit($id)
    {
        return $this->feeInvoice->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->feeInvoice->update($request,$id);
    }//end update


    public function destroy($id)
    {
        return $this->feeInvoice->destroy($id);
    }//end of destroy
}//end of controller
