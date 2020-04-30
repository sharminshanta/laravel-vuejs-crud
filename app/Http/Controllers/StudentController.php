<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

/**
 * Class StudentController
 * @package App\Http\Controllers
 */
class StudentController extends Controller
{
    /**
     * all students
     * @return array
     */
    public function index()
    {
        $students = Students::all()->toArray();
        return array_reverse($students);
    }

    /**
     * add students
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $student = new Students([
            'name' => $request->input('name'),
            'class' => $request->input('class')
        ]);
        $student->save();

        return response()->json('The student successfully added');
    }

    /**
     * edit students
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $student = Students::find($id);
        return response()->json($student);
    }

    /**
     * update students
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $student = Students::find($id);
        $student->update($request->all());

        return response()->json('The student successfully updated');
    }

    /**
     * delete students
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $student = Students::find($id);
        $student->delete();

        return response()->json('The student successfully deleted');
    }
}
