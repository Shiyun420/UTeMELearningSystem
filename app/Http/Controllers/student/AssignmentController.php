<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\LecturerCourse;
use App\Models\StudentAssignment;

class AssignmentController extends Controller
{
    // Method to show the submission form
    public function showToBeCompleted($id)
    {
        $lecturerCourseID=$id;
        $lecturerCourse = LecturerCourse::where('id', $lecturerCourseID)
                                ->with('course')
                                ->first();
        $course = $lecturerCourse->course;
        session(['lecturerCourseID' => $id]);
        session(['course' => $course]);

        $assignments = Assignment::where('lecturerCourseID', $lecturerCourseID)
                        ->whereNotIn('id', function ($query) {
                            $query->select('assignmentID')
                                ->from('student_assignments')
                                ->where('studentID', Auth::id());
                        })
                        ->orderBy('updated_at', 'desc')
                        ->get();

        return view('student.assignment.tobe_assignment', compact('assignments'));
    }

    public function showCompleted()
    {
        $lecturerCourseID=session('lecturerCourseID');

        //retrieve completed assignments
        $completedAssignments = StudentAssignment::where('studentID', Auth::id())
            ->whereIn('assignmentID', function ($query) use ($lecturerCourseID) {
                $query->select('id')
                      ->from('assignments')
                      ->where('lecturerCourseID', $lecturerCourseID);
            })
            ->with('assignment')
            ->orderBy('updated_at', 'desc')
            ->get();

        // Logic to fetch the "completed" assignments
        return view('student.assignment.completed_assignments', compact('completedAssignments'));
    }

    public function showSubmissionForm($id)
    {   

        $assignment = Assignment::find($id);
        
        return view('student.assignment.add_submission', compact('assignment'));
    }

    // Method to submit the assignment
    public function submitAssignment(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // Example validation rules for file upload
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Save the file to the storage directory
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('assignmentsubmission'), $fileName);

            // Create a new Submission record in the database
            $submission = new StudentAssignment();
            $submission->assignmentID = $request->input('assignmentID');
            $submission->studentID = Auth::id();
            $submission->fileLocation = $fileName;
            $submission->save();
            
            // Redirect back with a success message
            return back()->with('success', 'Assignment submitted successfully.');
        }

        // If file upload fails, redirect back with an error message
        return back()->with('error', 'File upload failed.');
    }
    
    public function viewFeedback($id)
    {
        $lecturerCourseID=session('lecturerCourseID');

        //retrieve completed assignments
        $submittedAssignment = StudentAssignment::where('studentID', Auth::id())
                        ->where('assignmentID', $id)
                        ->with('assignment')
                        ->first();
        return view('student.assignment.view_feedback', compact('submittedAssignment'));
    }
}

