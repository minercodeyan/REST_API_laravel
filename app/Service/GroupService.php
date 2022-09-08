<?php

namespace App\Service;

use App\Exceptions\NotFoundException;
use App\Models\Group;

class GroupService
{

    public function findAll(){
        return Group::all();
    }

    public function findGroupByCode($code){
        return Group::with('students')
            ->where('code',"=",$code)
            ->firstOr(function (){
                throw new NotFoundException("group");});
    }

}
