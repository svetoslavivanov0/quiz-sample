<template>
  <div>
    <h2>Statistics</h2>
    <p>Correct answers: {{ $store.correctAnswers }}</p>
    <p>Wrong answers: {{ $store.wrongAnswers }}</p>
    <button @click="$store.restartQuiz">Restart</button>
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