<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function show($id){
        $material = Material::whereId($id)->with("lesson")->first();
        return response()->json($material);
    }
}
