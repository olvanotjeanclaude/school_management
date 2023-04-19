<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const TYPES = [
        "teacher" => 1,
        "student" => 2,
        "guest" => 3
    ];

    public function teacherLessons(){
        return $this->belongsToMany(User::class,"lesson_teacher","teacher_id","lesson_id")->withTimestamps();
    }

    public function studentLessons(){
        return $this->belongsToMany(User::class,"lesson_student","student_id","lesson_id")->withTimestamps();
    }

    public function scopeTeachers($query){
        return $query->where("type",self::TYPES["teacher"]);
    }

    public function scopeStudents($query){
        return $query->where("type",self::TYPES["student"]);
    }
}
