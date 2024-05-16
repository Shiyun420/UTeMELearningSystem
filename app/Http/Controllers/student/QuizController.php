<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function ToBeCompleted()
    {
        $quizzes = [
            ['id' => 1, 'title' => 'Quiz 1: Intro to HTML'],
            ['id' => 2, 'title' => 'Quiz 2'],
            ['id' => 3, 'title' => 'Quiz 3'],
            // Add more quizzes as needed
        ];
        return view('student.quiz.tobe_quiz', compact('quizzes'));
    }

    public function Completed()
    {
        // Logic to fetch the "completed" assignments
        $quizzes = [
            ['id' => 1, 'title' => 'Quiz 1: Intro to HTML'],
            ['id' => 2, 'title' => 'Quiz 2'],
            ['id' => 3, 'title' => 'Quiz 3'],
            // Add more quizzes as needed
        ];
        return view('student.quiz.completed_quiz', compact('quizzes'));
    }
    public function start($id)
    {
        // Retrieve quiz details by ID (dummy data for now)
        $quiz = [
            'id' => $id,
            'title' => "Quiz $id: Example Quiz",
            'questions' => [
                [
                    'question' => 'What is HTML?',
                    'options' => [
                        'A' => 'HyperText Markup Language',
                        'B' => 'HyperText Markdown Language',
                        'C' => 'HyperTool Multi Language',
                        'D' => 'None of the above',
                    ],
                ],
        ]
        ];

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
}
