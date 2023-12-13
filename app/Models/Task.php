<?php

namespace App\Models;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'course_id', 'status', 'deadline', 'pdf_module_name', 'pdf_module_data', 'description'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'course_id', 'course_code');
    }
}
