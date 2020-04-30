<?php

namespace App\Http\Controllers;

use App\Teachers;
use Illuminate\Http\Request;

/**
 * Class TeacherController
 * @package App\Http\Controllers
 */
class TeacherController extends Controller
{
    /**
     * all teachers
     * @return array
     */
    public function index()
    {
        $teachers = Teachers::all()->toArray();
        return array_reverse($teachers);
    }

    /**
     * add teachers
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $teacher = new Teachers([
            'name' => $request->input('name'),
            'class' => $request->input('class')
        ]);
        $teacher->save();

        return response()->json('The teacher successfully added');
    }

    /**
     * edit Teachers
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $teacher = Teachers::find($id);
        return response()->json($teacher);
    }

    /**
     * update Teachers
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $teacher = Teachers::find($id);
        $teacher->update($request->all());

        return response()->json('The teacher successfully updated');
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $teacher = Teachers::find($id);
        $teacher->delete();

        return response()->json('The teacher successfully deleted');
    }
}
