<template>
  <div class="quote">
    <p>{{ title }}</p>

    <ul>
      <li v-for="author in authors" :key="author.id">
        <button type="button" class="btn" @click="$emit('select', author)">{{ author.name }}</button>
      </li>
    </ul>
  </div>
</template>

<script>
/**
 * External dependencies
 */

/**
 * Internal dependencies
 */
export default {
  name: 'QuestionComponent',
  props: {
    title: {
      type: String,
      required: () => true,
    },
    authors: {
      type: Array,
      required: () => true,
    },
  }
}
</script>

<style scoped>

</style>