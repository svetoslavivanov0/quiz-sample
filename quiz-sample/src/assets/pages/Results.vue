<template>
  <div class="page page-statistic">
    <h2>Statistics</h2>

    <p class="correct">Correct answers: {{ $store.correctAnswers }}</p>

    <p class="wrong">Wrong answers: {{ $store.wrongAnswers }}</p>

    <button class="btn" @click="$store.restartQuiz">Restart</button>
  </div>
</template>

<script>

import { useQuizStore } from "@/store";

export default {
  name: 'ResultsComponent',
  setup() {
    const store = useQuizStore();

    return {
      $store: store
    }
  }
}
</script>

<style scoped>

</style>