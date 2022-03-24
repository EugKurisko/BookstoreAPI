import {createRouter, createWebHistory} from "vue-router";
import AuthorAll from "../views/Authors/AuthorAll.vue";
import AuthorAllWithBooks from "../views/Authors/AuthorAllWithBooks.vue";
import AllRoutes from "../views/AllRoutes.vue";
import BookAll from "../views/Books/BookAll.vue";
import BookAllWithAuthors from "../views/Books/BookAllWithAuthors.vue";
import AuthorPage from "../views/Authors/AuthorPage.vue";
import BookPage from "../views/Books/BookPage.vue";
import AuthorCreate from "../views/Authors/AuthorCreate.vue";
import AuthorUpdate from "../views/Authors/AuthorUpdate.vue";
import BookCreate from "../views/Books/BookCreate.vue";
import BookUpdate from "../views/Books/BookUpdate.vue";

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
    {
        path: '/books/all',
        name: 'allBooks',
        component: BookAll
    },
    {
        path: '/books/allWithAuthors',
        name: 'allBooksWithAuthors',
        component: BookAllWithAuthors
    },
    {
        path: '/authors/:authorId/show',
        name: 'authorPage',
        component: AuthorPage
    },
    {
        path: '/books/:bookId/show',
        name: 'bookPage',
        component: BookPage
    },
    {
        path: '/authors/create',
        name: 'createAuthor',
        component: AuthorCreate
    },
    {
        path: '/authors/:authorId/update',
        name: 'updateAuthor',
        component: AuthorUpdate
    },
    {
        path: '/books/create',
        name: 'createBook',
        component: BookCreate
    },
    {
        path: '/books/:bookId/update',
        name: 'updateBook',
        component: BookUpdate
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
