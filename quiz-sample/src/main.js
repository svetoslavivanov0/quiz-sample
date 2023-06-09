/**
 * External dependencies
 */
import { createApp } from 'vue';
import { createPinia } from 'pinia';

/**
 * Internal dependencies
 */
import App from './App.vue';
import router from '@/router';

// Create the Pinia store
const pinia = createPinia();

// Create the app instance
const app = createApp(App);

// Use Vue Router and Pinia in the app
app.use(router);
app.use(pinia);

app.mount('#app');

import '../src/assets/css/styles.scss';

