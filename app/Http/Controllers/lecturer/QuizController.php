<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\Question;
use App\Models\Selection;

class QuizController extends Controller
{

    public function index($id){

        $courseID=$id;
        $quizzes = Quiz::where('courseID', $id)->get();
        
        return view('lecturer.quiz.index', compact('courseID', 'quizzes'));            
    }

    public function details($quizID)
    {          

        $quiz = Quiz::findOrFail($quizID);

        $questions = Question::where('quizID', $quizID)->get();

        $courseID = $quiz->courseID; 
        $quizID=$quiz->id;

        return view('lecturer.quiz.details', compact('courseID', 'questions','quizID'));
    }


    public function add_question($quizID){
        
        $quiz = Quiz::findOrFail($quizID);
        $courseID = $quiz->courseID;
        
        return view('lecturer.quiz.add_question',compact('quiz','courseID'));             
    }

    public function add_question_post(Request $request)
    {
        // Create a new question
        $question = new Question();
        $question->question = $request->input('question');
        $question->quizID = $request->input('quizID');
        $question->save();
        

        // Create selections for the question
        for ($i = 1; $i <= 4; $i++) {
            $selection = new Selection();
            $selection->selection = $request->input('choice' . $i);
            $selection->isTrue = $request->input('correct_choice') == $i;
            $selection->questionID = $question->id;
            $selection->save();
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Question added successfully.');
    }


    public function add_quiz(Request $request)
    {

        $quiz = new Quiz();
        $quiz->name = $request->input('name');
        $quiz->courseID=$request->input('courseID');
        $quiz->save();

        //$students = User::where('userType', 'student')->get();

        // Insert each student and the quiz ID into the student_quiz table
        /*foreach ($students as $student) {
            $studentQuiz = new StudentQuiz();
            $studentQuiz->studentID = $student->id; 
            $studentQuiz->quizID= $quiz->id; // the id of the newly created quiz
            $studentQuiz->save();
        }*/

        return redirect()->back()->with('success', 'Quiz added successfully.');
    }

    

    
}
