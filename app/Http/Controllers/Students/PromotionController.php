<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    protected $promotions;

    public function __construct(StudentPromotionRepositoryInterface $promotions)
    {

         $this->promotions = $promotions;


    }//end of construct

    public function index()
    {

        return $this->promotions->getPromotions();

    }//end of index

    public function create()
    {

        return $this->promotions->managePromotions();

    }//end of create


    public function store(Request $request)
    {

        return $this->promotions->storePromotions($request);

    }//end of store

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        return $this->promotions->destroyPromotions($request);
    }//end of destroy
}
