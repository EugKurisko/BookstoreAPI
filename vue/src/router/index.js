import {createRouter, createWebHistory} from "vue-router";
import AuthorAll from "../views/AuthorAll.vue";
import AllRoutes from "../views/AllRoutes.vue";

const routes = [
    {
        path: '/authors/all',
        name: 'allAuthors',
        component: AuthorAll
    },
    {
        path: '/routes',
        name: 'routes',
        component: AllRoutes
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
