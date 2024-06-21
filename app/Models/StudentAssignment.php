<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssignment extends Model
{
    use HasFactory;

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignmentID');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'studentID');
    }
}
