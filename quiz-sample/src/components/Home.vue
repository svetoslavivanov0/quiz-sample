<template>
  <div>
    <h2>Quote Quiz</h2>
    <div v-if="$store.currentQuestion">
      <p>{{ $store.currentQuestion.quote }}</p>
      <ul>
        <li v-for="author in $store.currentQuestion.authors" :key="author.id">
          <button @click="$store.checkAnswer(author)">{{ author.name }}</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { computed, reactive } from 'vue';
import { useQuizStore } from "@/store";

export default {
  name: 'HomeComponent',
  setup() {
    const state = reactive({
      quote: '',
      authors: [],
      showResult: false,
      isCorrect: false,
      correctAuthorName: ''
    });

    const store = useQuizStore();

    store.initializeQuestions();

    return {
      quote: computed(() => state.quote),
      authors: computed(() => state.authors),
      showResult: computed(() => state.showResult),
      isCorrect: computed(() => state.isCorrect),
      correctAuthorName: computed(() => state.correctAuthorName),
      $store: store,
    };
  }
};
</script>
