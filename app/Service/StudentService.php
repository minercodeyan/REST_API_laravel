<?php

namespace App\Service;

use App\Exceptions\NotFoundException;
use App\Models\Group;
use App\Models\Student;

class StudentService
{
    public function findAll(){
        return Student::all();
    }

    public function createStudent($stud){
        return Student::create($stud);
    }

    public function findById($id){
        return Student::findOr($id,function (){
            throw new NotFoundException("student");
        });
    }

    public function updateStudent($input,$stud) : void{
        $stud->firstname = $input['firstname'];
        $stud->lastname = $input['lastname'];
        $stud->save();;
    }

    public function deleteStudent($stud) : void{
        $stud->delete();;
    }
}
