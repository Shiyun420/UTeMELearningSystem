<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class AnnouncementController extends Controller
{

    public function index(){
              
        return view('lecturer.announcement.index');             
    }

    //when add announcement, use annoucement->courseID=session('lecturerCourseID');
    
}
