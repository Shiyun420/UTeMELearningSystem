let questions = [];
let currentQuestionIndex = 0;
const quizID = document.getElementById('quizID').value;
const studentID=document.getElementById('studentID').value;
console.log(studentID);
async function fetchQuestions() {
    try {
        const response = await fetch(`/lecturer/quizzes/${quizID}/${studentID}/questions`);
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
                <p><strong>Question ${index + 1}:</strong></p>
                <p>${question.question}</p>
                ${question.selections.map((selection, i) => `
                    <div>           
                        <input type="radio" id="selection${i}" name="selection" value="${selection.id}" ${selection.isSelected ? 'checked' : ''} disabled>
                        <label for="selection${i}">${selection.selection}</label>
                        ${selection.isSelected && selection.isTrue ? '<span style="color: green;">&#10004;</span>' : ''}
                        ${!selection.isSelected && selection.isTrue ? '<span style="color: green;">&#10004;</span>' : ''}
                        ${selection.isSelected && !selection.isTrue ? '<span style="color: red;">&#10008;</span>' : ''}
                    </div>
                `).join('')}
            </div>
        `;

        document.getElementById('prev-btn').disabled = index === 0;
        const actionBtn = document.getElementById('action-btn');
        if (index === questions.length - 1) {
            actionBtn.textContent = 'Close';
            actionBtn.onclick = closePreview;
        } else {
            actionBtn.textContent = 'Next';
            actionBtn.onclick = nextQuestion;
        }

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


function closePreview(){
    window.location.href = `/lecturer/quizzes/view_submissions/${quizID}`;
}


document.addEventListener('DOMContentLoaded', () => {
    fetchQuestions();
});
