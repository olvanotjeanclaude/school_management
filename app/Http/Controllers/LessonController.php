<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $lessons = Lesson::with(["teachers", "students"])->get();
        return response()->json($lessons);
    }

    public function show($id)
    {
        $lesson = Lesson::where("id", $id)->orWhere("code", $id)->firstOrFail();

        return response()->json([
            "lesson" => $lesson,
            "countStudent" => $lesson->students()->count(),
            "countMaterial" => $lesson->materials()->count(),
        ]);
    }

    public function getStudents($id)
    {
        $lesson = Lesson::where("id", $id)->orWhere("code", $id)->firstOrFail();
        return response()->json([
            "lesson" => $lesson,
            "students" => $lesson->students
        ]);
    }

    public function getMaterials($id){
        $lesson = Lesson::where("id", $id)->orWhere("code", $id)->firstOrFail();
        return response()->json([
            "lesson" => $lesson,
            "materials" => $lesson->materials
        ]);
    }

    public function getHomeworks($id){
        return response()->json([]);
    }
}
