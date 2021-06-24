<?php


namespace App\Repository;


interface StudentPromotionRepositoryInterface
{

    public function getPromotions();

    public function storePromotions($request);

    public function managePromotions();

    public function destroyPromotions($request);




}//end of interface
