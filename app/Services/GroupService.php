<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Group;


class GroupService
{

    public function findAll(){
        return Group::all();
    }

    public function findGroupByCode($code){
        return Group::with('products')
            ->where('code',"=",$code)
            ->firstOr(function (){
                throw new NotFoundException("group");});
    }

    public function deleteGroup($id): bool{
        return Group::findOr( $id,function (){
            throw new NotFoundException("Group already deleted and");
        })->delete();
    }
}
