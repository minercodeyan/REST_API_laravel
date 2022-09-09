<?php

namespace App\Service;

use App\Constant\ValidationConstant;
use App\Exceptions\NotFoundException;
use App\Models\Student;
use App\Utils\projectValidator;
use Illuminate\Validation\ValidationException;


class StudentService
{
    protected ProjectValidator $projectValidator;

    public function __construct(ProjectValidator $projectValidator)
    {
        $this->projectValidator = $projectValidator;
    }

    public function findAll(){
        return Student::all();
    }

    /**
     * @throws ValidationException
     */
    public function createStudent($stud){
        $this
            ->projectValidator
            ->validateRequest($stud,ValidationConstant::getStudentValidationForSave());
        return Student::create($stud);
    }

    public function findById($id){
        return Student::findOr($id,function (){
            throw new NotFoundException("student");
        });
    }

    /**
     * @throws ValidationException
     */
    public function updateStudent($input, $stud) : void{
        $this
            ->projectValidator
            ->validateRequest($input,ValidationConstant::getStudentValidationForUpdate());
        $stud->firstname = $input['firstname'];
        $stud->lastname = $input['lastname'];
        $stud->save();;
    }

    public function deleteStudent($stud) : void{
        $stud->delete();;
    }
}
