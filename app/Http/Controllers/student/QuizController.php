<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Selection;
use App\Models\StudentQuiz;
use App\Models\StudentQuestion;

class QuizController extends Controller
{
    public function toBeCompleted($id)
    {
        $studentID = Auth::id();
        $courseID = $id;
        $course=Course::find($courseID);
        // Retrieve quizzes where the quizID and studentID are not found in StudentQuiz entity
        $quizzes = Quiz::where('courseID', $courseID)
        ->whereNotIn('id', function($query) use ($studentID) {
            $query->select('quizID')
                  ->from('student_quizzes')
                  ->where('studentID', $studentID);
        })->get();
        
        return view('student.quiz.tobe_quiz', compact('course','quizzes', 'courseID'));
    }

    public function Completed()
    {
        $studentID = Auth::id();
        $courseID = session('courseID');
        $course=Course::find($courseID);

        $completedQuizzes = Quiz::join('student_quizzes', 'quizzes.id', '=', 'student_quizzes.quizID')
        ->where('student_quizzes.studentID', $studentID)
        ->where('quizzes.courseID', $courseID)
        ->get();

        return view('student.quiz.completed_quiz', compact('completedQuizzes','course','courseID'));
    }

    public function start($id)
    {
        // Get the currently authenticated student ID
        $studentID = Auth::id();
        $quizID = $id;
        $quiz=Quiz::find($quizID);

        // Insert a new record into the student_quizzes table
        $studentQuiz = new StudentQuiz();
        $studentQuiz->studentID = $studentID;
        $studentQuiz->quizID = $quizID;
        $studentQuiz->save();

        // Retrieve all questions related to the quiz
        $questions = Question::where('quizID', $quizID)->get();

        // Insert records into the student_questions table for each question
        foreach ($questions as $question) {
            $studentQuestion = new StudentQuestion();
            $studentQuestion->studentID = $studentID;
            $studentQuestion->questionID = $question->id;
            $studentQuestion->save();
        }

        // Redirect to the view to start the quiz
        return view('student.quiz.start_quiz', compact('quiz'));
    }

    public function submitQuiz(Request $request, $id)
    {
        // Process submitted quiz answers
        $answers = $request->input('answers');

        // Validate and process the answers
        foreach ($answers as $questionIndex => $answer) {
            // Perform operations on each answer (e.g., save to database, calculate score)
            // For now, we just output the answers
            echo "Question $questionIndex: Selected answer $answer<br>";
        }

        // Redirect back or to a different page after processing
        return redirect()->route('tobe_quiz')->with('status', 'Quiz submitted successfully!');
    }

    public function getQuestions($quizID)
    {
        $studentID = Auth::id();
        
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

    public function saveSelection(Request $request)
    {
        $studentID = Auth::id();
        $questionID = $request->input('questionID');
        $selectionID = $request->input('selectionID');
        $quizID = $request->input('quizID'); // Retrieve the quizID if needed

        // Find the student question record
        $studentQuestion = StudentQuestion::where('studentID', $studentID)
                            ->where('questionID', $questionID)
                            ->first();

        // Update the selection ID
        if ($studentQuestion) {
            $studentQuestion->selectionID = $selectionID;
            $studentQuestion->save();
        }

        return response()->json(['status' => 'success']);
    }

    public function displayMarks($quizID)
    {
        // Get the authenticated student's ID
        $studentID = Auth::id();
        $quiz=Quiz::find($quizID);
        $quizName=$quiz->name;
        // Fetch all questions for the quiz
        $questions = Question::where('quizID', $quizID)->get();

        $correctAnswers = 0;
        $totalQuestions = count($questions);

        // Loop through each question to calculate the number of correct answers
        foreach ($questions as $question) {
            // Fetch the student's selected answer for the question
            $studentSelection = StudentQuestion::where('studentID', $studentID)
                ->where('questionID', $question->id)
                ->first();

            if ($studentSelection) {
                // Fetch the correct selection for the question
                $correctSelection = Selection::where('questionID', $question->id)
                    ->where('isTrue', 1)
                    ->first();

                // Compare the student's selected answer with the correct answer
                if ($studentSelection->selectionID == $correctSelection->id) {
                    $correctAnswers++;
                }
            }
        }

        // Calculate the marks based on correct answers
        $marks = ($correctAnswers / $totalQuestions) * 100;

        // Update the student's marks in the student_quizzes table
        $studentQuiz = StudentQuiz::where('studentID', $studentID)
            ->where('quizID', $quizID)
            ->first();

        if ($studentQuiz) {
            $studentQuiz->marks = $marks;
            $studentQuiz->save();
        }

        // Return the results to the view
        return view('student.quiz.display_marks', compact('quizName','marks','quizID'));
    }

    public function previewQuiz($quizID) {
        $quiz = Quiz::find($quizID);
        $studentID = Auth::id(); // Assuming you're using Laravel's authentication
        $studentQuiz = StudentQuiz::where('quizID', $quizID)
                                   ->where('studentID', $studentID)
                                   ->first(); // Assuming there's only one record for each student quiz
        $marks = $studentQuiz ? $studentQuiz->marks : 0; // Default to 0 if no record found
        return view('student.quiz.preview', compact('quiz', 'marks'));
    }
    
}
