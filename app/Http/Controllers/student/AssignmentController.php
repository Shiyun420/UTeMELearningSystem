<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission; // Assuming you have a Submission model

class AssignmentController extends Controller
{
    // Method to show the submission form
    public function showToBeCompleted()
    {
        // Logic to fetch the "to-be-completed" assignments
        return view('student.assignment.tobe_assignment');
    }

    public function showCompleted()
    {
        // Logic to fetch the "completed" assignments
        return view('student.assignment.completed_assignments');
    }

    public function showSubmissionForm()
    {
        return view('student.assignment.add_submission');
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
            $path = $file->store('assignments');

            // Create a new Submission record in the database
            $submission = new Submission();
            $submission->file_path = $path;
            $submission->save();

            // Optionally, you can do more with the submission data (e.g., associate it with a specific assignment)

            // Redirect back with a success message
            return back()->with('success', 'Assignment submitted successfully.');
        }

        // If file upload fails, redirect back with an error message
        return back()->with('error', 'File upload failed.');
    }
    public function viewFeedback($id)
    {
      

        return view('student.assignment.view_feedback');
    }
}

