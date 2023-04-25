<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ["material_type_text"];

    const TYPES = [
        "Ders Kitabı",
        "Haftalık Ders Notu",
        "Reference",
        "Ödev",
        "Ödev Yardımcı Doküman",
        "Makale",
        "Diğer"
    ];

    public function getMaterialTypeTextAttribute()
    {
        return self::TYPES[$this->material_type] ?? "";
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
