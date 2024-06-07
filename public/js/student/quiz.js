let questions = [];
let currentQuestionIndex = 0;
const quizID = document.getElementById('quizID').value;

async function fetchQuestions() {
    try {
        const response = await fetch(`/quizzes/${quizID}/questions`);
        questions = await response.json();
        console.log(questions);
        populateSidebar(questions);
        displayQuestion(currentQuestionIndex);
    } catch (error) {
        console.error('Error fetching questions:', error);
    }
}

function populateSidebar(questions) {
    const questionGrid = document.getElementById('question-grid');
    questionGrid.innerHTML = ''; // Clear any existing content
    questions.forEach((question, index) => {
        const questionLink = document.createElement('a');
        questionLink.href = `#question${index + 1}`;
        questionLink.className = 'question-rect';
        questionLink.id = `question-link-${index}`;
        questionLink.textContent = index + 1;
        questionLink.addEventListener('click', (e) => {
            e.preventDefault();
            currentQuestionIndex = index;
            displayQuestion(currentQuestionIndex);
        });
        questionGrid.appendChild(questionLink);
    });
}

function displayQuestion(index) {
    const questionDisplay = document.getElementById('question-display');
    const question = questions[index];

    if (question) {
        questionDisplay.innerHTML = `
            <div>
                <p><strong>Question ${index+1}:</strong></p>
                <p>${question.question}</p>
                ${question.selections.map((selection, i) => `
                    <div>           
                        <input type="radio" id="selection${i}" name="selection" value="${selection.id}" ${selection.isSelected ? 'checked' : ''}>
                        <label for="selection${i}">${selection.selection}</label>
                    </div>
                `).join('')}
            </div>
        `;

        document.getElementById('prev-btn').disabled = index === 0;
        const actionBtn = document.getElementById('action-btn');
        if (index === questions.length - 1) {
            actionBtn.textContent = 'Submit';
            actionBtn.onclick = submitQuiz;
        } else {
            actionBtn.textContent = 'Next';
            actionBtn.onclick = nextQuestion;
        }

        document.querySelectorAll('input[name="selection"]').forEach(input => {
            input.addEventListener('change', () => saveSelection(question.id, input.value));
        });

        highlightCurrentQuestion(index);
    }
}

function highlightCurrentQuestion(index) {
    // Remove the highlight from all question links
    document.querySelectorAll('.question-rect').forEach(link => {
        link.classList.remove('current-question');
    });

    // Highlight the current question link
    const currentLink = document.getElementById(`question-link-${index}`);
    if (currentLink) {
        currentLink.classList.add('current-question');
    }
}

function prevQuestion() {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        displayQuestion(currentQuestionIndex);
    }
}

function nextQuestion() {
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        displayQuestion(currentQuestionIndex);
    }
}

async function saveSelection(questionID, selectionID) {
    try {
        const response = await fetch(`/student/save-selection`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ questionID, selectionID, quizID })
        });
        const result = await response.json();
        console.log('Selection saved:', result);

        // Update the local state of questions with the new selection
        const question = questions.find(q => q.id === questionID);
        if (question) {
            question.selections.forEach(selection => {
                selection.isSelected = selection.id === parseInt(selectionID);
            });
        }
    } catch (error) {
        console.error('Error saving selection:', error);
    }
}

function submitQuiz() {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Submitted!",
                text: "Your quiz has been submitted.",
                icon: "success"
            }).then(() => {
                // Redirect to the desired Laravel route
                window.location.href = `/student/quiz/${quizID}/displaymarks`;
            });
        }
      });
}

document.addEventListener('DOMContentLoaded', () => {
    fetchQuestions();
});
