<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\StudentQuiz;

class QuizController extends Controller
{

    public function index($id){

        $courseID=$id;
        $quizzes = Quiz::where('courseID', $id)->get();
        
        return view('lecturer.quiz.index', compact('courseID', 'quizzes'));            
    }

    public function details(){
              
        return view('lecturer.quiz.details');             
    }

    public function add_question(){
              
        return view('lecturer.quiz.add_question');             
    }

    public function add_quiz(Request $request)
    {

        // Create a new quiz
        $quiz = new Quiz();
        $quiz->name = $request->input('name');
        $quiz->courseID=$request->input('courseID');
        $quiz->save();

        // Get all students
        $students = User::where('userType', 'student')->get();

        // Insert each student and the quiz ID into the student_quiz table
        foreach ($students as $student) {
            $studentQuiz = new StudentQuiz();
            $studentQuiz->studentID = $student->id; 
            $studentQuiz->quizID= $quiz->id; // the id of the newly created quiz
            $studentQuiz->save();
        }


        // Redirect back with success message
        return redirect()->back()->with('success', 'Quiz added successfully.');
    }

    
}
