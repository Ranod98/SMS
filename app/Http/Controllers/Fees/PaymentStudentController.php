<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\PaymentStudentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentStudentController extends Controller
{


    protected $paymentStudent ;
    public function __construct(PaymentStudentRepositoryInterface $paymentStudent)
    {
        $this->paymentStudent = $paymentStudent;
    }//end of cons

    public function index()
    {
        return $this->paymentStudent->index();
    }//end of index


    public function create()
    {
        //
    }//end of create


    public function store(Request $request)
    {
        return $this->paymentStudent->store($request);
    }//end of store


    public function show($id)
    {
        return $this->paymentStudent->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->paymentStudent->edit($id);

    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->paymentStudent->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->paymentStudent->destroy($id);

    }//end of destroy
}//end of controller
