import { defineStore } from 'pinia';
import router from '@/router';

export const useQuizStore = defineStore('quiz', {
    state: () => ({
        questions: [],
        currentQuestionIndex: 0,
        correctAnswers: 0,
        wrongAnswers: 0,
        router: null,
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
            const questions = [
                {
                    quote: 'Quote 1',
                    authors: [
                        { id: 1, name: 'Author 1' },
                        { id: 2, name: 'Author 2' },
                        { id: 3, name: 'Author 3' },
                    ],
                    correctAuthorId: 1,
                },
                {
                    quote: 'Quote 2',
                    authors: [
                        { id: 1, name: 'Author 1' },
                        { id: 2, name: 'Author 2' },
                        { id: 3, name: 'Author 3' },
                    ],
                    correctAuthorId: 2,
                },
                {
                    quote: 'Quote 3',
                    authors: [
                        { id: 1, name: 'Author 1' },
                        { id: 2, name: 'Author 2' },
                        { id: 3, name: 'Author 3' },
                    ],
                    correctAuthorId: 3,
                },
                // Add more questions here...
            ];
            this.questions = questions;
        },
        async checkAnswer(author) {
            if (author.id === this.currentQuestion.correctAuthorId) {
                this.correctAnswers++;
                alert('Correct! The right answer is ' + author.name);
            } else {
                this.wrongAnswers++;
                const correctAuthor = this.currentQuestion.authors.find(
                    (a) => a.id === this.currentQuestion.correctAuthorId
                );
                alert('Sorry, you are wrong! The right answer is ' + correctAuthor.name);
            }

            if (this.sessionCompleted) {
                await router.push('/results');
            } else {
                this.currentQuestionIndex++;
            }
        },
        restartQuiz() {
            this.currentQuestionIndex = 0;
            this.correctAnswers = 0;
            this.wrongAnswers = 0;
            router.push('/');
        },
    },
});
