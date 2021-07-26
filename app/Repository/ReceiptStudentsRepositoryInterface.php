<?php


namespace App\Repository;


interface ReceiptStudentsRepositoryInterface
{
    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request,$id);

    public function destroy($id);

}//end of interface
