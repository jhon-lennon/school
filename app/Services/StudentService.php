<?php

namespace App\Services;

use App\Models\Students;
use DateTime;


class StudentService
{
    public function __construct(private Students $model)
    {
    }

    public function getAllStudents()
    {
        return $this->model->get()->toJson(JSON_PRETTY_PRINT);
    }

    public function showStudent($id)
    {
        if ($this->model->where('id', $id)->exists()) {
            return $this->model->where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        } else {
            return false;
        }
    }

    public function createStudent($request)
    {
        return $this->model->query()->create([
            'name' =>  $request['name'],
            'course' => $request['course'],
            'updated_at' => new DateTime(),
            'created_at' => new DateTime(),
        ]);
    }

    public function updateStudent($id, $request)
    {
        if ($this->model->where('id', $id)->exists()) {
            $student = $this->model->find($id);
            $student->name = $request->input('name');
            $student->course = $request->input('course');
            $student->save();

            return true;
        } else {
            return false;
        }
    }

    public function deleteStudent($id)
    {
        if ($this->model->where('id', $id)->exists()) {
            $student = $this->model->find($id);
            $student->delete();
            return true;
        } else {
            return false;
        }
    }
}
