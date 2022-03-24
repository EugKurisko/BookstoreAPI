<template>
    <BookIterator v-bind:books="this.books"/>
</template>

<script>
import BookIterator from "./BookIterator.vue";
import axios from "axios";
export default {
    name: "BookAll",
    components: {
        BookIterator
    },
    created() {
        this.getBooks()
    },
    data() {
        return {
            books: [],
        }
    },
    methods: {
        getBooks() {
            axios.get('http://localhost/api/books/all').
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
