<template>
    <BookIterator v-bind:books="this.books"/>
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
            axios.get('http://localhost/api/books/allWithAuthors').
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
