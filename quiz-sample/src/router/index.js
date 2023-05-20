import { createRouter, createWebHistory } from "vue-router";
import Home from "@/components/Home.vue";
import Results from "@/components/Results.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/results', component: Results }
    ]
});

export default router;