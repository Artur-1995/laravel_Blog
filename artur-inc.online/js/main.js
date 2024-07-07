// Скрипт квиза
const quizData = [{
        question: "Вопрос 1",
        a: "Вариант 1",
        b: "Вариант 2",
        c: "Вариант 3",
        currect: "a",
    },
    {
        question: "Вопрос 2",
        a: "Вариант 1",
        b: "Вариант 2",
        c: "Вариант 3",
        currect: "b",
    },
    {
        question: "Вопрос 3",
        a: "Вариант 1",
        b: "Вариант 2",
        c: "Вариант 3",
        currect: "c",
    },
];

const quiz = document.getElementById("quiz");
const answerElements = document.querySelectorAll(".answer");
const questionElement = document.getElementById("question");
const a_text = document.getElementById("a_text");
const b_text = document.getElementById("b_text");
const c_text = document.getElementById("c_text");
const submit = document.getElementById("submit");

let currentQuiz = 0;
let score = 0;

loadQuiz();

function loadQuiz() {
    const currentQuizData = quizData[currentQuiz];

    questionElement.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
    c_text.innerText = currentQuizData.c;
}

function deselectAnswer() {
    answerElements.forEach((answerEl) => (answerEl.checked = false));
}

function getSelected() {
    let answer;
    answerElements.forEach((answerEl) => {
        if (answerEl.checked) {
            answer = answerEl.id;
        }
    });
    return answer;
}

submit.addEventListener("click", () => {
    const answer = getSelected();

    if (answer) {
        if (answer === quizData[currentQuiz].currect) {
            score++;
        }

        currentQuiz++;

        if (currentQuiz < quizData.length) {
            loadQuiz();
        } else {
            quiz.innerHTML =
                "<h2>Совпадение ответоа " +
                score +
                "/" +
                quizData.length +
                " questions </h2> <button onclick='location.reload()'>Попробовать снова</button>";
        }
    }
});