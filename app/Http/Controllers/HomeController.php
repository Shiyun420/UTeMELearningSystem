<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id()){
            if(Auth::user()->userType=='student'){

                return redirect()->route('student.search_course');
            }
            else if(Auth::user()->userType=='admin'){

                $lecturers=User::where('usertype', 'lecturer')->get();

                return view('admin.home', compact('lecturers'));
            }
            else if(Auth::user()->userType=='lecturer'){
                return redirect()->route('lecturer.home');
            }
        }else{
            return redirect()->back();
        }


    }
}
