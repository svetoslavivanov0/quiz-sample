import { defineStore } from 'pinia';
import router from '@/router';
import axios from "axios";

export const useQuizStore = defineStore('quiz', {
    state: () => ({
        questions: [],
        currentQuestionIndex: 0,
        correctAnswers: 0,
        wrongAnswers: 0,
    }),
    getters: {
        currentQuestion(state) {
            return state.questions[state.currentQuestionIndex];
        },
        sessionCompleted(state) {
            return state.currentQuestionIndex >= state.questions.length - 1;
        },
    },
    actions: {
        initializeQuestions() {
            axios.get('api/quotes')
                .then((result) => {
                    this.questions = result.data.map((quote) => {
                        return {
                            ...quote,
                            authors: JSON.parse(quote.authors)
                        }
                    });
                })
        },
        checkAnswer(author) {
            axios.post('api/quote', {
                quoteId: this.currentQuestion.id,
            }).then((response) => {
                const correctAuthorId = response.data.correct;

                if (correctAuthorId === author.id) {
                    this.correctAnswers++;
                    alert('Correct! The right answer is ' + author.name);
                } else {
                    this.wrongAnswers++;
                    const correctAuthor = this.currentQuestion.authors.find(
                        (a) => a.id === correctAuthorId
                    );
                    alert('Sorry, you are wrong! The right answer is ' + correctAuthor.name);
                }

                if (this.sessionCompleted) {
                    router.push('/results');
                } else {
                    this.currentQuestionIndex++;
                }
            }).catch(() => {
                alert('Please try again later');
            })
        },
        restartQuiz() {
            this.currentQuestionIndex = 0;
            this.correctAnswers = 0;
            this.wrongAnswers = 0;
            router.push('/');
        },
    },
});
