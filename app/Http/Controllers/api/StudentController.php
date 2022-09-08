<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use App\Service\GroupService;
use App\Service\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Http\JsonResponse;

class StudentController extends BaseController
{

    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }


    public function index(): JsonResponse
    {
        $students = $this->studentService->findAll();
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
        $student = $this->studentService->createStudent($input);
        return $this->sendResponse($student->toArray(), 'Student created successfully.');
    }

    public function show($id): JsonResponse
    {
        $student = $this->studentService->findById($id);
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
        $this->studentService->updateStudent($input, $student);
        return $this->sendResponse($student->toArray(), 'Student updated successfully.');
    }

    public function destroy(Student $student): JsonResponse
    {
        $this->studentService->deleteStudent($student);
        return $this->sendResponse($student->toArray(), 'Student deleted successfully.');
    }
}
