<template>
    <div v-if="this.books.length > 0">
        <BookIterator v-bind:books="this.books"/>
    </div>
    <div v-else>
        There are no books
    </div>
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
            axios.get('api/books/all').
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
