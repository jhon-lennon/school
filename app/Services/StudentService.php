<?php

namespace App\Services;

use App\Models\Students;
use DateTime;


class StudentService{
    
    public function __construct(private Students $model){

    }

    public function createStudent($request){

       return $this->model->query()->create([
            'name' =>  $request['name'],
            'course' => $request['course'],
            'updated_at' => new DateTime(),
            'created_at' => new DateTime(),
        ]);
    }
}