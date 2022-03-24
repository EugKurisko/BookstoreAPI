import {createRouter, createWebHistory} from "vue-router";
import AuthorAll from "../views/Authors/AuthorAll.vue";
import AuthorAllWithBooks from "../views/Authors/AuthorAllWithBooks.vue";
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
    },
    {
        path: '/authors/allWithBooks',
        name: 'allAuthorsWithBooks',
        component: AuthorAllWithBooks
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
