<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\StudentAssignment;

class AssignmentController extends Controller
{
    //To display all assignments
    public function index($id){
        $lecturerCourseID=$id;
        $assignments = Assignment::Where('lecturerCourseID', $lecturerCourseID)->orderBy('updated_at', 'desc')->get();

        return view('lecturer.assignment.index',compact('assignments', 'lecturerCourseID'));             
    }

    //POST: Add assignment
    public function add_assignment(Request $request)
    {
        $data = new Assignment;
        $data->title = $request->title;
        $data->instruction = $request->instruction;
        $data->lecturerCourseID = $request->lecturerCourseID;

        // Handle assignment file upload
        if ($request->hasFile('assignment_file')) {
            $file = $request->file('assignment_file');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('assignmentFiles'), $fileName);
            $data->assignment_file = $fileName;
        }

        $data->save();

        return redirect()->back();
    }

    //GET: return the view (Edit assignment)
    public function edit_assignment_view($id)
    {
        $assignment=Assignment::find($id);
        $lecturerCourseID = $assignment->lecturerCourseID;
        return view('lecturer.assignment.edit_assignment_view', compact('assignment', 'lecturerCourseID'));
    }
    
    //POST: Edit assignment
    public function edit_assignment(Request $request, $id)
    {
        $assignment=Assignment::find($id);
        $assignment->title=$request->title;
        $assignment->instruction=$request->instruction;
        $assignment->lecturerCourseID = $request->lecturerCourseID;
        
        // Handle assignment file upload
        if ($request->hasFile('assignment_file')) {
            $file = $request->file('assignment_file');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('assignmentFiles'), $fileName);
            $assignment->assignment_file = $fileName;
        }
        
        $assignment->save();
        return redirect()->back()->with('message', 'Assignment Details Updated Successfully');
    }

    public function assignment_submission($id)
    {
        $lecturerCourseID = session('lecturerCourseID');
        $assignment = Assignment::find($id);

        // Retrieve students who have or have not submitted the assignment
        $studentAssignments = DB::table('users as u')
            ->leftJoin('student_assignments as sa', function ($join) use ($id) {
                $join->on('u.id', '=', 'sa.studentID')
                    ->where('sa.assignmentID', '=', $id);
            })
            ->whereIn('u.id', function ($query) use ($lecturerCourseID) {
                $query->select('studentID')
                    ->from('enrollments')
                    ->where('courseID', '=', $lecturerCourseID);
            })
            ->select('u.name', 'u.id', 'sa.*')
            ->get();

        return view('lecturer.assignment.submission', compact('studentAssignments', 'assignment'));             
    }

    public function give_feedback($studentID, $assignmentID)
    {
        $studentAssignment = StudentAssignment::where('assignmentID', $assignmentID)
            ->where('studentID', $studentID)
            ->with(['assignment', 'student'])
            ->first();

        return view('lecturer.assignment.give_feedback', compact('studentAssignment'));             
    }

    public function submit_feedback(Request $request)
    {
        $assignmentID = $request->assignmentID;
        $studentID = $request->studentID;

        StudentAssignment::where('assignmentID', $assignmentID)
        ->where('studentID', $studentID)
        ->update(['feedback' => $request->feedback]);

        return redirect()->back()->with('message', 'Feedback Updated Successfully');           
    }
    
}
