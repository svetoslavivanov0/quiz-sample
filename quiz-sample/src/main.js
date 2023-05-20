import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import { createPinia } from 'pinia';
import App from './App.vue';
import Home from './components/Home.vue';
import Results from './components/Results.vue';

// Create the router instance
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/results', component: Results }
    ]
});

// Create the Pinia store
const pinia = createPinia();

// Create the app instance
const app = createApp(App);

// Use Vue Router and Pinia in the app
app.use(router);
app.use(pinia);

app.mount('#app');
