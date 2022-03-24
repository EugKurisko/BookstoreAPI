<template>
    <div v-if="this.authors.length > 0">
        <AuthorIterator v-bind:authors="this.authors"/>
    </div>
    <div v-else>
        There are no authors with books
    </div>
</template>

<script>
import axios from 'axios'
import AuthorIterator from "./AuthorIterator.vue";
export default {
    name: "AuthorAllWithBooks",
    components: {
      AuthorIterator
    },
    created() {
        this.getAuthorsWithBooks()
    },
    data() {
        return {
            authors: [],
        }
    },
    methods: {
        getAuthorsWithBooks() {
            axios.get('http://localhost/api/authors/allWithBooks').
            then((response) => {
                this.authors = response.data.data
            }).
            catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>

</style>
