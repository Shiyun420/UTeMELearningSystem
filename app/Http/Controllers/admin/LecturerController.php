<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LecturerController extends Controller
{
    public function showlecturers(){
        $lecturers = User::where('usertype', 'lecturer')->get();

        return view('admin.lecturer', compact('lecturers'));
              
    }
    
    public function add_lecturer(){
        return view('admin.add_lecturer');
              
    }

    public function view_lecturer($id){

        $lecturer = User::find($id);
        return view('admin.view_lecturer', compact('lecturer'));
    }

    public function register_lecturer(Request $request)
    {
        $lecturer=new User;

        $lecturer->name=$request->name;
        $lecturer->IC=$request->IC;
        $lecturer->email=$request->email;
        $lecturer->phoneNum=$request->phoneNum;
        $lecturer->userType='lecturer';
        $lecturer->password=Hash::make($request->password);

        $lecturer->save();

        return redirect()->back();
    }
}
