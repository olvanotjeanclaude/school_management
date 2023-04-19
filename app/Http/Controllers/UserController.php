<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->get("type"), function ($q) {
            $q->where("type", User::TYPES[request("type")] ?? "");
        })->get();
        return response()->json($users);
    }
}
