<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Http\JsonResponse;

class StudentController extends BaseController
{
    public function index(): JsonResponse
    {
        $students = Student::all();
        return $this->sendResponse($students->toArray(), 'Students retrieved successfully.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'parent'=>'required',
            'number'=>'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $student = Student::create($input);
        return $this->sendResponse($student->toArray(), 'Student created successfully.');
    }

    public function show($id): JsonResponse
    {
        $student = Student::find($id);
        if (is_null($student)) {
            return $this->sendError('Student not found.');
        }
        return $this->sendResponse($student->toArray(), 'Student retrieved successfully.');
    }

    public function update(Request $request, Student $student): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $student->firstname = $input['firstname'];
        $student->lastname = $input['lastname'];
        $student->save();
        return $this->sendResponse($student->toArray(), 'Student updated successfully.');
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return $this->sendResponse($student->toArray(), 'Student deleted successfully.');
    }
}
