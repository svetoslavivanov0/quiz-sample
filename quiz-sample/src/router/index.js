/**
 * External dependencies
 */
import { createRouter, createWebHistory } from 'vue-router';

/**
 * Internal dependencies
 */
import Home from '@/pages/Home.vue';
import Results from '@/pages/Results.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/results', component: Results }
    ]
});

export default router;