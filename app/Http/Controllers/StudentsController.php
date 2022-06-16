<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStudent;
use App\Services\StudentService;

class StudentsController extends Controller
{
    public function __construct(private StudentService $studentService)
    {
    }

    public function index()
    {
        $students =  $this->studentService->getAllStudents();
        return response($students, 200);
    }

    public function store(StoreUpdateStudent $request,)
    {
        $this->studentService->createStudent($request->validated());
        return response()->json([
            "message" => "student record created"
        ], 200);
    }

    public function show($id)
    {
        $student = $this->studentService->showStudent($id);

        if ($student) {
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        };
    }

    public function update(StoreUpdateStudent $request, $id)
    {
        $student = $this->studentService->updateStudent($id, $request);

        if ($student) {
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        $student = $this->studentService->deleteStudent($id);

        if ($student) {
            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }
}
