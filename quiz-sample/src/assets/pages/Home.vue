<template>
  <div class="page">
    <h2>Quote Quiz</h2>

    <question
        v-if="$store.currentQuestion"
        :title="$store.currentQuestion.quote"
        :authors="$store.currentQuestion.authors"
        @select="$store.checkAnswer($event)"
    />
  </div>
</template>

<script>
/**
 * External dependencies
 */

/**
 * Internal dependencies
 */
import { useQuizStore } from '@/store';
import Question from '@/components/Question.vue';

export default {
  name: 'HomeComponent',
  components: {
    Question,
  },
  setup() {
    const store = useQuizStore();

    store.initializeQuestions();

    return {
      $store: store,
    };
  }
};
</script>
