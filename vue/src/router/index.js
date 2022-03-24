import {createRouter, createWebHistory} from "vue-router";
import AuthorAll from "../views/AuthorAll.vue";

const routes = [
    {
        path: '/authors/all',
        name: 'allAuthors',
        component: AuthorAll
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
