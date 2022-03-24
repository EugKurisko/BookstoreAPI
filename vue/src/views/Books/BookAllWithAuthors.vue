<template>
    <div v-if="this.books.length > 0">
        <BookIterator v-bind:books="this.books"/>
    </div>
    <div v-else>
        There are no books with authors
    </div>
</template>

<script>
import BookIterator from "./BookIterator.vue";
import axios from "axios";

export default {
    name: "BookAllWithAuthors",
    components: {
        BookIterator
    },
    created() {
        this.getBooksWithAuthors()
    },
    data() {
        return {
            books: [],
        }
    },
    methods: {
        getBooksWithAuthors() {
            axios.get('api/books/allWithAuthors').
            then((response) => {
                this.books = response.data.data
            }).
            catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>

</style>
