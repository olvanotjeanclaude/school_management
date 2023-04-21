<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $datas = [
            "countAllUsers" => User::count(),
            "countStudents" =>User::where("type",User::TYPES["student"])->count(),
            "countTeachers" =>User::where("type",User::TYPES["teacher"])->count(),
            "countGuest" =>User::where("type",User::TYPES["guest"])->count(),
            "allLessons" => Lesson::all()
        ];

        return response()->json($datas);
    }
}
