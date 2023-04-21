<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ["codeAndName","teacher"];

    public function teachers(){
        return $this->belongsToMany(User::class,"lesson_teacher","lesson_id","teacher_id")->withTimestamps();
    }

    public function students(){
        return $this->belongsToMany(User::class,"lesson_student","lesson_id","student_id")->withTimestamps();
    }

    public function materials(){
        return $this->hasMany(Material::class);
    }

    public function getCodeAndNameAttribute(){
        return "{$this->code}-{$this->name}";
    }

    public function getTeacherAttribute(){
        return $this->teachers()->first();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
