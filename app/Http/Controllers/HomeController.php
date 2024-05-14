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

                return view('student.search_course');
            }
            else if(Auth::user()->userType=='admin'){
                return view('admin.home');
            }
            else if(Auth::user()->userType=='lecturer'){
                return view('lecturer.home');
            }
        }else{
            return redirect()->back();
        }


    }
}
