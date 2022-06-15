<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStudent;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Services\StudentService;
use DateTime;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentsController extends Controller
{
    public function index()
    {

        $students = Students::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

 
    public function store(StoreUpdateStudent $request, StudentService $studentService)
    {
        $studentService->createStudent($request->validated());
        return response()->json([
            "message" => "student record created"
        ], 200);
    }

    public function show($id)
    {

        if (students::where('id', $id)->exists()) {
            $student = Students::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {

        if (Students::where('id', $id)->exists()) {
            $student = Students::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();

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
        if (Students::where('id', $id)->exists()) {
            $student = Students::find($id);
            $student->delete();

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
