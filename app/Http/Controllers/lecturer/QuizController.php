<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\StudentQuestion; 
use App\Models\Question;
use App\Models\Selection;

class QuizController extends Controller
{

    public function index($id){

        $quizzes = Quiz::where('courseID', $id)->get();
        
        return view('lecturer.quiz.index', compact('quizzes'));            
    }

    public function details($quizID)
    {          

        $quiz = Quiz::findOrFail($quizID);

        $questions = Question::where('quizID', $quizID)->get();

        $quizID=$quiz->id;

        return view('lecturer.quiz.details', compact('questions','quizID'));
    }


    public function add_question($quizID){
        
        $quiz = Quiz::findOrFail($quizID);
     
        
        return view('lecturer.quiz.add_question',compact('quiz'));             
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

    public function view_submissions($quizID)
    {          
        // Find the quiz
        $quiz = Quiz::findOrFail($quizID);

        // Perform a join query to retrieve student names and marks
        $submissionData = DB::table('student_quizzes')
            ->join('users', 'student_quizzes.studentID', '=', 'users.id')
            ->select('users.name as student_name', 'student_quizzes.marks as marks','users.id as studentID')
            ->where('student_quizzes.quizID', $quizID)
            ->get();

      
    

        return view('lecturer.quiz.view_submission', compact('quiz', 'submissionData'));
    }

    public function preview_submission($quizID,$studentID) {
       
        $quiz = Quiz::find($quizID);

        $studentQuiz = StudentQuiz::where('quizID', $quizID)
                                   ->where('studentID', $studentID)
                                   ->first(); // Assuming there's only one record for each student quiz
        $marks = $studentQuiz ? $studentQuiz->marks : 0; // Default to 0 if no record found

        $student = User::find($studentID);
        
        return view('lecturer.quiz.preview_submission', compact('quiz', 'marks','student'));
    }

    public function getQuestions($quizID,$studentID)
    {
      
        
        // Fetch questions for the given quizID
        $questions = Question::where('quizID', $quizID)->get();

        // Fetch selections and check if the student has selected any
        $questionsWithSelections = $questions->map(function ($question) use ($studentID) {
            $selections = Selection::where('questionID', $question->id)->get();
            $studentSelection = StudentQuestion::where('studentID', $studentID)
                                                ->where('questionID', $question->id)
                                                ->first();

            // Map selections and mark the selected one
            $selections = $selections->map(function ($selection) use ($studentSelection) {
                $selection->isSelected = $studentSelection && $studentSelection->selectionID == $selection->id;
                return $selection;
            });

            $question->selections = $selections;
            return $question;
        });

        return response()->json($questionsWithSelections);
    }
    
}
